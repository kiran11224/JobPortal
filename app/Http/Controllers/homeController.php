<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\job;

class homeController extends Controller
{
public function index(Request $request)
    {

     $query = Job::where('status', 1)->with('jobType');

    if ($request->sort == 'latest') {
        $query->orderBy('created_at', 'DESC');
    } elseif ($request->sort == 'oldest') {
        $query->orderBy('created_at', 'ASC');
    } else {
        $query->orderBy('created_at', 'DESC'); // default latest
    }

    $jobs = $query->paginate(10);

    $catagories = Catagory::where('status',1)->orderBy('name','ASC')->take(8)->get();

       $featuredJob = job::where('isFeatured',1)
                        ->with('jobType')
                        ->orderBy('created_at','DESC')
                        ->take(6)
                        ->get();

        $latestJob = job::where('status',1)->with('jobType')->orderBy('created_at','DESC')->take(6)->get();
        
        return view('front.home',compact('catagories','featuredJob','latestJob',));
    }
}
