@extends('layouts.main')

@section('main')

    @if(session()->has('success'))
    <div class="alert alert-success  col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="text-center">Halo</h1>
    <div class="d-flex justify-content-around">
        
        @auth
            @if ($quiz)
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz->title }}</h5>
                        <p class="card-text">Ini quiz {{ $quiz->title }}</p>
                        <a href="/quiz/landing/{{ $quiz->id }}" class="btn btn-primary">Detail Quis</a>
                    </div>
                </div>
            @else
                <p>Belum ada quiz untuk ditampilkan.</p>
            @endif
        @endauth
    </div>

@endsection