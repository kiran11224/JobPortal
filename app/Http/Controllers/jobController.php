<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\job_type;
use App\Models\job;
use Illuminate\Http\Request;

class jobController extends Controller
{
   public function index(Request $request) {
    $catagory = Catagory::where('status', 1)->get();
    $jobTypes = job_type::where('status', 1)->get();

    $jobs = job::where('status', 1);

    // Search by keywords (title or keywords column)
    if ($request->filled('keywords')) {
        $keywords = $request->input('keywords');
        $jobs = $jobs->where(function ($query) use ($keywords) {
            $query->where('title', 'LIKE', "%{$keywords}%")
                  ->orWhere('keywords', 'LIKE', "%{$keywords}%");
        });
    }

    // You can add similar filters for location, category, job_type, experience here if needed.
   // Location filter
    if ($request->filled('location')) {
        $location = $request->input('location');
        $jobs = $jobs->where('location', 'LIKE', "%{$location}%");
    }

    // Category filter
    if ($request->filled('category')) {
        $category = $request->input('category');
        // Assuming category is stored as category_id or name in jobs table
        $jobs = $jobs->where('category_id', $category);
        // If you store category name instead, use:
        // $jobs = $jobs->where('category', $category);
    }

    // Job Type filter (can be multiple checkboxes)
    if ($request->filled('job_type')) {
        $job_types = $request->input('job_type');
        if (is_array($job_types)) {
            $jobs = $jobs->whereIn('job_type_id', $job_types);
        } else {
            $jobs = $jobs->where('job_type_id', $job_types);
        }
    }
    if ($request->filled('experience')) {
    $experience = (int) $request->input('experience');
    if ($experience == 11) {
        // 10+ years means experience >= 10
        $jobs = $jobs->where('experience', '>=', 10);
    } else {
        $jobs = $jobs->where('experience', $experience);
    }
}


    $jobs = $jobs->with('jobType')->orderBy('created_at', 'DESC')->paginate(9)->withQueryString();

    return view('front.layouts.jobs', compact('catagory', 'jobTypes', 'jobs'));
}
}

