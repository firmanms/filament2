{{
    $profil->slug;
}}
<br><br>
@foreach ($page as $value )

{{ $value->title }}<br>
{!! $value->description !!}
----
{{ $value->team->slug }}
<a href="{{ url($value->team->slug . '/page/' . $value->slug )}}" target="_blank">Klik</a>


@endforeach
