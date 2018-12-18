<?php

namespace App\Http\Controllers;

use App\User; /* users table model */
use App\User_job_types; /* user_job_types table model */
use App\User_bank_details; /* user_bank_details table model */
use App\User_skills; /* user_bank_details table model */
use App\Projects; /* projects table model */
use App\Project_documents; /* projects table model */
use App\Type_of_projects; /* type_of_projects table model */
use App\Technologies; /* technologies table model */
use App\Equivalent_relevant_skills; /* equivalent_relevant_skills table model */
use App\certifications; /* certifications table model */
use App\freelancer_skills; /* freelancer_skills table model */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Request;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Google\Cloud\Core\ServiceBuilder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Transport\MailgunTransport;
use File;

class ProjectsController extends Controller {

    private function transformCollection($projects) {
        $projectsArray = $projects->toArray();
        return [
            'total' => $projectsArray['total'],
            'per_page' => intval($projectsArray['per_page']),
            'current_page' => $projectsArray['current_page'],
            'last_page' => $projectsArray['last_page'],
            'next_page_url' => $projectsArray['next_page_url'],
            'prev_page_url' => $projectsArray['prev_page_url'],
            'from' => $projectsArray['from'],
            'to' => $projectsArray['to'],
            'data' => array_map([$this, 'transform'], $projectsArray['data'])
        ];
    }

    private function transform($project) {
        return [
            'id' => $project['id'],
            'project_name' => $project['project_name'],
            'created_at' => $project['created_at'],
            'payment_type' => $project['payment_type']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search_term = request('search');
        $user_id = request('user_id');

        $limit = 10;

        if ($search_term) {
            $projects = Projects::orderBy('id', 'DESC')
                    ->where('project_name', 'LIKE', "%$search_term%")
                    ->where('user_id', '=', $user_id)
                    ->select('*')
                    ->paginate($limit);

            $projects->appends(array(
                'search' => $search_term,
                'limit' => $limit
            ));
        } else {
            $projects = Projects::select('*')
                    ->where('user_id', '=', $user_id)
                    ->paginate(10);
        }
        return Response::json($this->transformCollection($projects), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allProjects(Request $request) {
        $columns = array(
            0 => 'id',
            1 => 'project_name',
            2 => 'description',
            3 => 'created_at',
            4 => 'id',
        );

        $user_id = request('user_id');
        $limit = request('length');
        $start = request('start');
        $order = $columns[request('order.0.column')];
        $dir = request('order.0.dir');

        $totalData = Projects::where('user_id', $user_id)->count();

        $totalFiltered = $totalData;
        if (empty(request('search.value'))) {
            $posts = Projects::where('user_id', $user_id)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
        } else {
            $search = request('search.value');
            $posts = Projects::where('user_id', $user_id)->Where(function ($query) {
                                        $search = request('search.value');
                                        $query->where('id', 'LIKE', "%{$search}%")
                                        ->orWhere('project_name', 'LIKE', "%{$search}%")
                                        ->orWhere('location_type', 'LIKE', "%{$search}%")
                                        ->orWhere('payment_type', 'LIKE', "%{$search}%")
                                        ->orWhere('start_date', 'LIKE', "%{$search}%")
                                        ->orWhere('end_date', 'LIKE', "%{$search}%");
                                    })->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)->get();

            $totalFiltered = Projects::where('user_id', $user_id)->Where(function ($query) {
                                $search = request('search.value');
                                $query->where('id', 'LIKE', "%{$search}%")
                                        ->orWhere('project_name', 'LIKE', "%{$search}%")
                                        ->orWhere('location_type', 'LIKE', "%{$search}%")
                                        ->orWhere('payment_type', 'LIKE', "%{$search}%")
                                        ->orWhere('start_date', 'LIKE', "%{$search}%")
                                        ->orWhere('end_date', 'LIKE', "%{$search}%");
                            })->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $show = "Test";
                $edit = "Test2";

                $nestedData['project_name'] = $post->project_name;
                $nestedData['payment_type'] = $post->payment_type;
                $nestedData['location_type'] = $post->location_type;
                $nestedData['start_date'] = date('j M Y h:i a', strtotime($post->start_date));
                $nestedData['end_date'] = date('j M Y h:i a', strtotime($post->end_date));
                $nestedData['options'] = "<button type='button' class='btn btn-primary padding-bottom5'>More</button>";
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval(request('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function store(Request $request) {
        $path = public_path() . '/uploads';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $user_id = request('user_id') ? request('user_id') : "0";
        $project_name = request('project_name') ? request('project_name') : "";
        $description = request('description') ? request('description') : "";
        $payment_type = request('payment_type') ? request('payment_type') : "";
        $amount = request('amount') ? request('amount') : "";
        $fraalancer_type = request('fraalancer_type') ? request('fraalancer_type') : "";
        $number_of_freelancer = request('number_of_freelancer') ? request('number_of_freelancer') : "";
        $skills_of_freelancers = request('skills_of_freelancers') ? request('skills_of_freelancers') : "";
        $location_type = request('location_type') ? request('location_type') : "";
        $locations = request('locations') ? request('locations') : "";
        $skills_required = request('skills_required') ? request('skills_required') : "";
        $start_date = request('start_date') ? request('start_date') : "";
        $end_date = request('end_date') ? request('end_date') : "";
        $currency = request('currency') ? request('currency') : "";
        $last_date_of_bid = request('last_date_of_bid') ? request('last_date_of_bid') : "";
        $experience_type = request('experience_type') ? request('experience_type') : "";
        $experience_user_rate = request('experience_user_rate') ? request('experience_user_rate') : "";

        $type_of_project = request('type_of_project') ? request('type_of_project') : "";
        $technologies = request('technologies') ? request('technologies') : "";
        $certification = request('certification') ? request('certification') : "";
        $endorsement = request('endorsement') ? request('endorsement') : "";
        $weekly_availability_of_resource = request('weekly_availability_of_resource') ? request('weekly_availability_of_resource') : "";
        $equivalent_relevant_skills = request('equivalent_relevant_skills') ? request('equivalent_relevant_skills') : "";
        $education = request('education') ? request('education') : "";
        $awards = request('awards') ? request('awards') : "";

        $start_date = date("Y-m-d", strtotime($start_date));
        $end_date = date("Y-m-d", strtotime($end_date));
        $last_date_of_bid = date("Y-m-d", strtotime($last_date_of_bid));

        try {
            $project = Projects::create([
                        'user_id' => $user_id,
                        'project_name' => $project_name,
                        'description' => $description,
                        'payment_type' => $payment_type,
                        'amount' => $amount,
                        'fraalancer_type' => $fraalancer_type,
                        'number_of_freelancer' => $number_of_freelancer,
                        'skills_of_freelancers' => $skills_of_freelancers,
                        'location_type' => $location_type,
                        'locations' => $locations,
                        'skills_required' => $skills_required,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'currency' => $currency,
                        'last_date_of_bid' => $last_date_of_bid,
                        'experience_type' => $experience_type,
                        'experience_user_rate' => $experience_user_rate,
                        'type_of_project' => $type_of_project,
                        'technologies' => $technologies,
                        'certification' => $certification,
                        'endorsement' => $endorsement,
                        'weekly_availability_of_resource' => $weekly_availability_of_resource,
                        'equivalent_relevant_skills' => $equivalent_relevant_skills,
                        'education' => $education,
                        'awards' => $awards
            ]);
            if (isset($project->id)) {
                if (isset($_FILES['documents']) && !empty($_FILES['documents'])) {
                    $no_files = count($_FILES["documents"]['name']);
                    for ($i = 0; $i < $no_files; $i++) {

                        $document = md5(time() . mt_rand()) . basename($_FILES["documents"]["name"][$i]);
                        move_uploaded_file($_FILES['documents']['tmp_name'][$i], public_path() . "/uploads/" . $document);
                        Project_documents::create([
                            'project_id' => $project->id,
                            'document_name' => $document,
                        ]);
                    }
                }
                echo "1";
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            echo "0";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function get_type_of_projects() {
        return Type_of_projects::all();
    }

    public function get_all_technologies() {
        return Technologies::all();
    }

    public function get_all_equivalent_relevant_skills() {
        return Equivalent_relevant_skills::all();
    }

    public function get_all_certificates() {
        return certifications::all();
    }

    public function get_all_freelancer_skills() {
        return freelancer_skills::all();
    }

}
