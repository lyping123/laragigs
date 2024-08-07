
@foreach ($fruits as $fruit)
    <a href="/search/{{ $fruit->id }}">{{ $fruit->v_name }}</a>
@endforeach

