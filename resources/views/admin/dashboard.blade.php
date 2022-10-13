@extends('layouts.admin.app')

@section('admin_content')
<div class="container">
  <small>Admin Panel</small>
</div>

<div class="container mb-3" id="btn">
<a href="{{ route('post.create') }}" class="btn btn-success">Add New </a>
</div>             

<div class="container">
  <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Post Title</th>
          <th scope="col">Author Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $key=>$post)
        <tr>
          <th scope="row">{{ $key+1 }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->user->name }} <small><strong>@if ($post->user_id==1)
            {{ 'Admin' }}

            @else
            {{ 'Author' }}
          @endif</strong></small></td>
          <td>
            <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Show" data-off="Hide" {{ $post->status ? 'checked' : '' }}>
         </td>
        </tr>
        @empty
        <div class="swiper-slide">
          <strong>No Post Found :(</strong>
        </div><!-- swiper-slide -->
      
            
        @endforelse
       
       
      </tbody>
     
    </table>  
     
</div>
<div class="d-flex justify-content-center">
  {{$posts->links("pagination::bootstrap-5")}}
</div>  

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endsection