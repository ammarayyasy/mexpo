@extends('layouts.main')

@section('main')
    <h1>Judul quiz: {{ $quiz->title }}</h1>
    <a href="/quiz/start/{{ $quiz->id }}" class="btn btn-primary">Start</a>
    
@endsection