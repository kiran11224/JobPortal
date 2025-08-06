<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'catagory_id',
        'job_type_id',
        'vacancy',
        'experience',
        'salary',
        'location',
        'description',
        'benefits',
        'responsibility',
        'qualification',
        'keywords',
        'company_name',
        'company_location',
        'website',
        'user_id' // if you’re assigning the job to a user
    ];
}

