@extends('layouts.main')

@section('main')
<div class="container px-5 my-5">
    <div class="d-flex justify-content-center">
        <div class="col-lg-4">
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" id="email" type="email" placeholder="email" autocomplete="off" />
                    <label for="email">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password" id="password" type="password" placeholder="password" autocomplete="off" />
                    <label for="password">password</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection