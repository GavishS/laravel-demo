<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_documents extends Model {

    protected $fillable = [
        'project_id',
        'document_name'
    ];

}
