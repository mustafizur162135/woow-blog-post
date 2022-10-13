@extends('layouts.author.app')
@section('content')
    
<div class="container">
    <small> Post Details</small>
</div>
         

<div class="container">
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->body }}</p>
         
        </div>
      </div>              
  </div>

  <div class="container shadow p-3 mb-5 bg-body rounded">
    <h3>Add a Comments</h3>
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <form method="POST" action="{{ route('comment.add') }}" class="form-inline py-3">
            @csrf
           
            <div class="form-group mb-3">
                <label for="body">Your Comments Here</label>
                <textarea name="body" class="form-control" cols="30" rows="6"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Comment</button>
          </form>
    </div>
    @foreach($post->comments as $comment)
    
<div class="card shadow shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-body">
   
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
    </div>
</div>
    @endforeach
  </div>

 


@endsection