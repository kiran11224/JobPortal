@extends('front.layouts.app')
@section('content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                @include('front.account.sidebar')
                <div class="col-lg-9">

                    {{-- Show success or error messages --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <form action="{{ route('account.saveJob') }}" method="post" id="createJobForm" name="createJobForm">
                            @csrf
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body card-form p-4">
                                    <h3 class="fs-4 mb-1">Job Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                            <input type="text" placeholder="Job Title" id="title" name="title" class="form-control" value="{{ old('title') }}">
                                            @error('title')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="catagory" class="mb-2">Category<span class="req">*</span></label>
                                            <select name="catagory" id="catagory" class="form-control">
                                                <option value="">Select a Catagory</option>
                                                @if ($catagories !== '')
                                                    @foreach ($catagories as $catagories)
                                                        <option value="{{ $catagories->id }}">{{$catagories->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('category')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="job_nature" class="mb-2">Job Nature<span class="req">*</span></label>
                                            <select name="job_nature" id="job_nature" class="form-select">
                                                <option value="">Select</option>
                                                @if ($job_types !== '')
                                                    @foreach ($job_types as $type)
                                                        <option value="{{ $type->id }}" {{ old('job_nature') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('job_nature')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                            <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control" value="{{ old('vacancy') }}">
                                            @error('vacancy')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="salary" class="mb-2">Salary</label>
                                            <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control" value="{{ old('salary') }}">
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="job_location" class="mb-2">Location<span class="req">*</span></label>
                                            <input type="text" placeholder="Location" id="job_location" name="location" class="form-control" value="{{ old('location') }}">
                                            @error('location')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                        <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="benefits" class="mb-2">Benefits</label>
                                        <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ old('benefits') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="responsibility" class="mb-2">Responsibility</label>
                                        <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{ old('responsibility') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="qualifications" class="mb-2">Qualifications</label>
                                        <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{ old('qualifications') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="experience" class="mb-2">Experience<span class="req">*</span></label>
                                        <select name="experience" id="experience" class="form-control">
                                            <option value="">Select</option>
                                              <option value="1">1</option>
                                                <option value="2">2</option>
                                                  <option value="3">3</option>
                                        </select>
                                        @error('experience')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="keywords" class="mb-2">Keywords</label>
                                        <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control" value="{{ old('keywords') }}">
                                    </div>

                                    <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="company_name" class="mb-2">Name<span class="req">*</span></label>
                                            <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control" value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="company_location" class="mb-2">Location</label>
                                            <input type="text" placeholder="Location" id="company_location" name="company_location" class="form-control" value="{{ old('company_location') }}">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="website" class="mb-2">Website</label>
                                        <input type="text" placeholder="Website" id="website" name="website" class="form-control" value="{{ old('website') }}">
                                    </div>
                                </div>

                                <div class="card-footer p-4">
                                    <button type="submit" class="btn btn-primary">Save Job</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
