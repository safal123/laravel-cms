@if(isset($posts))
<h1>Posts</h1>
<!-- Blog Post -->
  @foreach($posts as $post)
    <div class="card mb-2">
      
        <a href="{{ route('blog.posts', $post->id) }}">
            <img class="card-img-top" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
        </a>
        <div class="card-body">
            <h2 class="card-title">{{ $post->name }}</h2>
            <p class="card-text">{!! $post->content !!}</p>
            <a href="{{ route('blog.posts', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on 
            <!-- dd($post) -->
            {{ $post->created_at->diffForHumans() }} by 
            <strong>{{ $post->user->name }}</strong> 
            @if($post->category)
                <a href="#" class="btn btn-sm btn-primary">{{ $post->category->name }}</a>
            @endif
        </div>
    </div>
  @endforeach
  <!-- Pagination -->
  <div class="col-xs-1" align="center">
      {{ $posts->links() }}
  </div>


@else
  @yield('content')
@endif