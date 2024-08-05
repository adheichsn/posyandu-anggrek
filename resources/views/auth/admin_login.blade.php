@extends('auth.layout')
@section('title', 'Login Admin')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card o-hidden border-0 shadow-lg my-lg-5 my-2">
                <div class="card-body p-0">
                    <div class="px-5 py-4">
                        <div class="text-center text-md-left">
                            <h1 class="h4 text-gray-900 mb-3" style="font-weight: 500">Admin Login</h1>
                        </div>
                        <div class="text-center">
                            <img class="w-25" src="{{ asset('img/login.png') }}" alt="login icon">
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="number" name="is_admin" class="d-none" value="1">
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="username" style="font-weight: 500">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="password" style="font-weight: 500">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button class="btn btn-block btn-warning" style="font-weight: 500;"
                                type="submit">Login</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
