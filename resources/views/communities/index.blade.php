<x-app-layout>
  <div>
    @foreach ($communities as $community)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
        <small class="text-muted">{{'By '.$community->user->name}}</small>
        <div class class="card-title">{{$community->title}}</div>
          <div class="card shadow-sm">
            <div class="card-body">
              <p class="card-text">{{$community->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" href={{ route('community.show', [$community]) }} class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">{{'Created at '.$community->created_at}}</small>
              </div>
            </div>
          </div>
        </div>
        <br>     
    </div>
    @endforeach
</div>

</x-app-layout>