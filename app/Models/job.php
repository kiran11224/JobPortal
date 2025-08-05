<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'category',
        'job_nature',
        'vacancy',
        'salary',
        'location',
        'description',
        'benefits',
        'responsibility',
        'qualifications',
        'keywords',
        'company_name',
        'company_location',
        'website',
        'user_id' // if you’re assigning the job to a user
    ];
}

