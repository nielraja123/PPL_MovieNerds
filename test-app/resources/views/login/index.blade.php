@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5" >
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif      
            
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif    
            
            <main class="form-signin">
                <form action="/login" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                
                    <div class="form-floating">
                        <label for="email">Email </label> <br>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                         
                        @enderror
                        <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                        @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    </div>

                    <div class="form-floating">
                        <label for="password">Password </label> <br>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                         
                        @enderror
                        <input type="password" name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="password" placeholder="Password" required ">                        
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary btn-danger" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-2">Not Registered? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
@endsection