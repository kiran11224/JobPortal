@extends('front.layouts.app')
@section('content')

<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col"> 
                <nav aria-label="breadcrumb" class="rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('jobs') }}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>

    <div class="container job_details_area">
        <div class="row pb-5">
            <!-- Job Details -->
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4>{{ $job->title ?? 'Software Engineer' }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i> {{ $job->location ?? 'Noida, India' }}</p>
                                        </div>
                                        <div class="location">
                                            <p><i class="fa fa-clock-o"></i> {{ $job->job_type ?? 'Part-time' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{ $job->description ?? 'Job description not available.' }}</p>
                        </div>

                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                <li>{{ $job->responsibility }}</li>
                              
                            </ul>
                        </div>

                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <li>{{ $job->qualification }}</li>
                               
                            </ul>
                        </div>

                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>{{ $job->benefits }}/p>
                        </div>

                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">
                            <a href="#" class="btn btn-secondary">Save</a>
                            <a href="#" class="btn btn-primary">Apply</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summary</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span>{{ $job->created_at->format('d M, Y') ?? 'N/A' }}</span></li>
                                <li>Vacancy: <span>{{ $job->vacancy ?? 'N/A' }}</span></li>
                                <li>Salary: <span>{{ $job->salary ?? 'N/A' }}</span></li>
                                <li>Location: <span>{{ $job->location ?? 'N/A' }}</span></li>
                                <li>Job Nature: <span>{{ $job->job_type ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Company Details</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Name: <span>{{ $job->company_name ?? 'XYZ Company' }}</span></li>
                                <li>Location: <span>{{ $job->company_location ?? 'Noida' }}</span></li>
                                <li>Website: <span>{{ $job->company_website ?? 'www.example.com' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
