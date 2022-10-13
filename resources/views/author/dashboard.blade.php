@extends('layouts.author.app')

@section('content')
<div class="container">
    <small>All Post Page</small>
</div>

<div class="container mb-3" id="btn">
<a href="{{ route('post.create') }}" class="btn btn-success">Add New </a>
</div>
<div class="container">

    @forelse ($posts as $post)
        
  
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">   
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ substr($post->body, 0,  100) }}</p>

          <div class="read_more">
        
            <a style="float: right;" href="{{ route('post.show',$post->id) }}" class="btn btn-primary">Read More</a>
            <p>Created By <strong>{{ $post->user->name }}</strong> {{ $post->created_at->diffForHumans() }}</p>

         
          </div>
          
          
          
        </div>
    </div> 
    @empty
    <div class="swiper-slide">
        <strong>No Post Found :(</strong>
    </div><!-- swiper-slide -->
    
    @endforelse

    

   
  </div>
  
<div class="d-flex justify-content-center">
    {!! $posts->links() !!}
</div>

@endsection