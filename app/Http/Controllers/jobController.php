<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\job_type;
use App\Models\job;
use Illuminate\Http\Request;

class jobController extends Controller
{
    public function index(){

        $catagory = Catagory::where('status',1)->get();
        $jobTypes = job_type::where('status',1)->get();
        $jobs = job::where('status', 1)->with('jobType')->orderBy('created_at','DESC')->paginate(9);
        return view('front.layouts.jobs',compact('catagory','jobTypes','jobs'));
    }
}
