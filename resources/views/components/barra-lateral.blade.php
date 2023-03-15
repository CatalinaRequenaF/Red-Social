<div>
    @foreach ($communities as $community)
        <li>
            <a href="route('communities/{{$community->id}}')"> {{$community->name}} </a>
        </li>
    @endforeach
</div>