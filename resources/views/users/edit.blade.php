@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    Update Profile
  </div>
  <div class="card-body">
    <form action="{{ route('users.update-profile') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
      </div>
      <button class="btn btn-primary btn-sm" type="submit">Update Profile</button>
    </form>
  </div>
</div>

@endsection