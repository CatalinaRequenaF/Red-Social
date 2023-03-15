
<div>
    @foreach ($posts as $post)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
        <div class class="card-title">{{$post->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$post->body}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
    @endforeach

</div>
