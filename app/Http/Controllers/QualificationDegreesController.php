<?php

namespace App\Http\Controllers;

use App\QualificationDegree;
use Illuminate\Http\Request;

class QualificationDegreesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QualificationDegree  $qualificationDegree
     * @return \Illuminate\Http\Response
     */
    public function show(QualificationDegree $qualificationDegree) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QualificationDegree  $qualificationDegree
     * @return \Illuminate\Http\Response
     */
    public function edit(QualificationDegree $qualificationDegree) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QualificationDegree  $qualificationDegree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualificationDegree $qualificationDegree) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QualificationDegree  $qualificationDegree
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualificationDegree $qualificationDegree) {
        //
    }

    public function get_all_qualification_degrees() {
        return QualificationDegree::all();
    }

}
