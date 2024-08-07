@foreach ($demos as $demo)
    {{ $demo->id }}<br>
    {{ $demo->m_name }} <br>
    {{ $demo->type }}<br>
    {{ $demo->num }}<br>
@endforeach
