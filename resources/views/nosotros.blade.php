@extends('plantilla')

@section('seccion')
    <h1>Este es mi equipo de trabajo</h1>
    @foreach ($equipo as $item)
        <a href="{{ route('nosotros',$item) }} " class="h4 text-danger">{{$item}}</a><br>
    @endforeach

    @if (!empty($nombre))
        @switch($nombre)
            @case($nombre == 'Ignacio')
                <h2 class="mt-5">El Nombre es: {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit excepturi voluptatibus non beatae, sequi mollitia quaerat officiis dolorem molestiae distinctio animi vero suscipit commodi odit perspiciatis sed facere iste esse.</p>
                @break
            @case($nombre == 'Juanito')
                <h2 class="mt-5">El Nombre es: {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit excepturi voluptatibus non beatae, sequi mollitia quaerat officiis dolorem molestiae distinctio animi vero suscipit commodi odit perspiciatis sed facere iste esse.</p>
                @break
            @case($nombre == 'Pedrito')
                <h2 class="mt-5">El Nombre es: {{ $nombre }}:</h2>
                <p>{{ $nombre }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit excepturi voluptatibus non beatae, sequi mollitia quaerat officiis dolorem molestiae distinctio animi vero suscipit commodi odit perspiciatis sed facere iste esse.</p>
                @break
            @default
                
        @endswitch
    @endif
@endsection

