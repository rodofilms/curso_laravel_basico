@extends('plantilla')

@section('seccion')
    <div class="container my-4">
        <h1 class="display-4">Notas</h1>

        <!-- Valida si la se envio un mensaje de respuesta luego de un POST -->
        @if(session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif
        
        <form action=" {{ route('notas.agregar') }} " method="POST">
            <!-- Funcion de laravel que evita el filtrado de informacion por formularios -->
            @csrf

            @error('nombre')
                <div class="alert alert-danger">
                    El nombre es obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            @error('descripcion')
                <div class="alert alert-danger">
                    La descripcion es obligatoria
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ old('descripcion') }}">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($notas as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>
                            <a href="{{ route('notas.detalle',$item) }}">
                                {{$item->nombre}}
                            </a>
                        </td>
                        <td>{{$item->descripcion}}</td>
                        <td>
                            <a href=" {{ route('notas.editar',$item) }} " class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
@endsection