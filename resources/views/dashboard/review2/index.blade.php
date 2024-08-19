@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Review {{ $quiz->name }}</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success  col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-9">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">User</th>
        <th scope="col">Jam Submit</th>
        <th scope="col">Score</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attempts as $attempt)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $attempt->user->name }}</td>
        <td>{{ $attempt->attempted_at }}</td>
        <td>{{ $attempt->results->score }}</td>
        <td>
          <a class="badge bg-info" href="/dashboard/review2/{{ $attempt->id }}">
            <span data-feather="eye" class="align-text-bottom"></span>
          </a>
          <form action="/dashboard/review2/{{ $attempt->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <span data-feather="x-circle" class="align-text-bottom"></span>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection