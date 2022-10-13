@extends('layouts.author.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <h5 class="card-title">Create Your Post</h5>
          <form method="POST" action="{{ route('post.store') }}" class="form-inline py-3">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Blog Title</label>
                <input type="text" name="title" placeholder="Enter Your Title" class="form-control"/>
            </div>
            <div class="form-group mb-3">
                <label for="body">Blog Description</label>
                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>              
  </div>
@endsection