@extends('layouts.author.app')
@section('content')
    
<div class="container">
    <small> Post Details</small>
</div>
@auth
@if (Auth::id()==$post->user_id  || Auth::user()->role_id==1)

<div class="container mb-3" id="btn">
    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-success">Edit</a>
</div>

@endif
@endauth
             

<div class="container">
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->body }}</p>
         
        </div>
      </div>              
  </div>

  <div class="container shadow p-3 mb-5 bg-body rounded">
    <h3>DisplayComments</h3>
    
    <hr />
    @include('author.reply', ['comments' => $post->comments, 'post_id' => $post->id])
    <hr />
    <h4>Add comment</h4>
    <div class="card shadow p-3 mb-5 bg-body rounded">
      <form method="POST" action="{{ route('comment.add') }}" class="form-inline py-3">
          @csrf
         
          <div class="form-group mb-3">
              <label for="body">Your Comments Here</label>
              <textarea name="commentbody" class="form-control" cols="30" rows="6"></textarea>
              <input type="hidden" name="post_id" value="{{ $post->id }}" /
          </div>
          
          <button type="submit" class="btn btn-primary">comment</button>
        </form>
  </div>
  </div>

  <div class="container">


  <div class="card shadow shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-body">
      This is some text within a card body.
    </div>
</div>
<div class="card shadow shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-body">
      This is some text within a card body.
    </div>
</div>
</div>
  


@endsection