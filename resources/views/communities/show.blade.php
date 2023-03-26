<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$community->title}}
        </h2>
    </x-slot>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ 'Created at ' . $community->created_at }}</small>
                <small class="text-muted">{{ 'By ' . $community->user->name }}</small>
            </div>
            <br>
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $community->description }}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Follow</button>
                    </div>
                </div>
            </div>

            <h1>Posts</h1>

            @if (sizeof($posts) > 0)
                <div>
                    @foreach ($posts as $post)
                        <small class="text-muted">{{ 'Created at ' . $post->created_at }}</small>
                        <small class="text-muted">{{ 'By ' . $post->user->name }}</small>
                        <br>
                            <div class="card-body">
                              
                        <a type="button" href={{ route('post.show', ['community' => $community, 'post' => $post]) }}
                          class="btn btn-sm btn-outline-secondary">{{ $post->title }}</a>
                      <div class="card shadow-sm">
                                <p class="card-text">{{ $post->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        @php
                                            $likes = $post->likes->where('value', 1);
                                            $dislikes = $post->likes->where('value', -1);
                                        @endphp
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Like
                                                {{ count($likes) }}</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Dislike
                                                {{ count($dislikes) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h2>No hay comunidades creadas.</h2>
            @endif



</x-app-layout>
