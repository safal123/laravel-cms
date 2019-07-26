@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    Users
  </div>
  <div class="card-body">
  @if($users->count() > 0)
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Image</th>
        <th>Email</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td>
            @if($user == auth()->user())
            <a href="{{ route('users.update-profile') }}">{{ $user->name }}</a>
            @else
            {{ $user->name }}
            @endif
            
          </td>
          <td>
            <img width="40px" height="40px" style="border-radius:50%;" src="{{ Gravatar::src($user->email) }}" alt="">
          </td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            @if(!$user->isAdmin())
              <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-info" type="submit"> Make Administrator </button>
              </form>
              
            @else
              <button class="btn btn-sm btn-success" disabled> Admin User </button>
            @endif
          </td>
         
          <td>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @else
    <h3 class="text-center">No users yet.</h3>
  @endif
  </div>
</div>

@endsection