@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    Posts by <strong>{{ auth()->user()->name }}</strong>
    <a href="{{ route('posts.create') }}" class="btn btn-success float-right">Add Post</a>
  </div>
  <div class="card-body">
  @if($posts->count() > 0)
    <table class="table">
      <thead>
        <th>Title</th>
        <th>Image</th>
        <th>Category</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
      @foreach($posts as $post)
        <tr>
          <td>{{ $post->title }}</td>
          <td>
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="120px" height="60px">
          </td>
          <td>
            @if($post->category)
              <a href="{{ route('categories.edit', $post->category->id) }}">{{ $post->category->name }}</a>
            @else
              <p>No categories found.</p>
            @endif
            
          </td>
          @if(auth()->user()->id == $post->user->id)
            <td>
            @if($post->trashed())
              <form action="{{ route('restore-post', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-info btn-sm">Restore</button>
              </form>
            @else
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
            @endif
            </td>
          
            <td>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                  {{ $post->trashed() ? 'Delete' : 'Trash' }}
                </button>
              </form>
            </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>
      @endforeach
      </tbody>
    </table>
  @else
    <h3 class="text-center">{{ $message }}</h3>
  @endif
  </div>
</div>

@endsection