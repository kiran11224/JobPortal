@extends('front.layouts.app')
@section('content')

<section class="section-5">

     @if (session('success'))
        <div class="alert w-50 mx-auto mt-3 alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert w-50 mx-auto mt-3 alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>

                    {{-- Show validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
    
                    <form method="POST" action="{{ route('account.processRegistration') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2">Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                        </div>  
                        <div class="mb-3">
                            <label class="mb-2">Email*</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                        </div> 
                        <div class="mb-3">
                            <label class="mb-2">Password*</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div> 
                        <div class="mb-3">
                            <label class="mb-2">Confirm Password*</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div> 
                        <button type="submit" class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a href="{{ route('account.login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
