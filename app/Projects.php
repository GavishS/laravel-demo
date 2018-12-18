<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model {
    //
    protected $fillable = [
        'user_id',
        'project_name',
        'description',
        'payment_type',
        'amount',
        'fraalancer_type',
        'number_of_freelancer',
        'skills_of_freelancers',
        'location_type',
        'locations',
        'skills_required',
        'start_date',
        'end_date',
        'experience_type',
        'experience_user_rate',
        'status',
        'last_date_of_bid',
        'currency',
        'type_of_project',
        'technologies',
        'certification',
        'endorsement',
        'weekly_availability_of_resource',
        'equivalent_relevant_skills',
        'education',
        'awards',
    ];
}
