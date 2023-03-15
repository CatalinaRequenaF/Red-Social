<html>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
        <small class="text-muted">{{'By '.$community->user->name}}</small>
        <div class class="card-title">{{$community->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$community->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{'Created at '.$community->created_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @foreach ($posts as $post)
        <small class="text-muted">{{'By '.$post->user->name}}</small>
        <div class class="card-title">{{$post->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$post->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" href={{ route('posts.show', [$post]) }} class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">{{'Created at '.$post->created_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach




</html>