@foreach($post->comments as $comment)
<div class="display-comment">
  <strong>{{ $comment->user->name }}</strong>
  <p>{{ $comment->comment }}</p>
  {{-- <a href="" id="reply"></a> --}}
  <form method="post" action="{{ route('reply.add') }}">
      @csrf
      <div class="form-group">
          <input type="text" name="commentbody" class="form-control" />
          <input type="hidden" name="post_id" value="{{ $post->id }}" />
          <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-warning" value="Reply" />
      </div>
  </form>
  {{-- @include('author.reply', ['comments' => $comments->replies]) --}}
</div>
    @endforeach