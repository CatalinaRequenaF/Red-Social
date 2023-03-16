
<div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <small class="text-muted">{{'Created at '.$post->created_at}}</small>
          <small class="text-muted">{{'By '.$post->user->name}}</small>
        <div class class="card-title">{{$post->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$post->body}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Dislike</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>

        @foreach ($comments as $comment)
        <small class="text-muted">{{'By '.$comment->user->name}}</small>
        <small class="text-muted">{{'Created at '.$comment->created_at}}</small>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$comment->body}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Dislike</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        <form method="post" action="{{ route('comment.store') }}">
          @csrf
          <input type="hidden" name="post_id" value="{{$post->id}}">
          <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
          <textarea name="body" placeholder="Deja un comentario"></textarea>
          <button type="submit">Comentar</button>
      </form>
      
</div>
