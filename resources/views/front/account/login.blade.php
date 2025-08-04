@extends('front.layouts.app')
@section('content')

@if($errors->any())
    <div class="alert alert-danger d-none">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
        <div class="alert w-50 mx-auto mt-3 alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
        </div>
@endif
<section class="section-5">


    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Login</h1>
                    <form action="{{ route('account.authenticate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                           <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        </div> 
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2">Login</button>
                            <a href="{{ route('account.login') }}" class="mt-3">Forgot Password?</a>
                        </div>
                    </form>                    
                </div> 
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a  href="{{ route('account.registration') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection