@extends('welcome')

@section('content')
<h1 class="my-4">{{ $post->title }}</h1>
<hr>
<div class="card mb-4">
  <img class="card-img-top" src="{{ asset($post->image) }}" alt="Card image cap">
  <div class="card-body">
      <h2 class="card-title">{{ $post->name }}</h2>
      <p class="card-text">{!! $post->content !!}</p>
  </div>
  <div class="card-footer text-muted">
        Posted on 
        <strong>{{ $post->created_at->diffForHumans() }}</strong> 
        @if($post->category)
            <a href="#" class="btn btn-sm btn-primary">{{ $post->category->name }}</a>
        @endif
  </div>
</div>

  <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    
    var disqus_config = function () {
    this.page.url = " {{ config('app.url')}}/blog/posts/{{$post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-localhost-8000-7qemowzepa.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>

    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

@endsection