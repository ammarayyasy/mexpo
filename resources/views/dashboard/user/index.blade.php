@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All User</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success  col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif

  @if(session()->has('error'))
  <div class="alert alert-danger  col-lg-9" role="alert">
    {{ session('error') }}
  </div>
  @endif

  <div class="table-responsive col-lg-9">
    <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary mb-3">Create New User</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <a class="badge bg-warning" href="/dashboard/user/{{ $user->id }}/edit"><span data-feather="edit" class="align-text-bottom"></span></a>
            <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection