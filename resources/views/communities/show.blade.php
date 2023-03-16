<html>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{'Created at '.$community->created_at}}</small>
            <small class="text-muted">{{'By '.$community->user->name}}</small>
          </div>
          <br>
        <div class class="card-title">{{$community->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$community->description}}</p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">Follow</button>
              </div>
          </div>
        </div>

        @foreach ($posts as $post)
        <small class="text-muted">{{'Created at '.$post->created_at}}</small>
        <small class="text-muted">{{'By '.$post->user->name}}</small> 
<br>
        <a type="button" href={{route('post.show', ['community' => $community, 'post' => $post])}} class="btn btn-sm btn-outline-secondary">{{$post->title}}</a>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$post->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Dislike</button>
                    </div>              </div>
            </div>
          </div>
        </div>
        @endforeach
       




</html>