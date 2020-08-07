@extends('plantilla')

@section('seccion')
    <div class="container my-4">
        <h1 class="display-4">Editar Nota: {{$nota->id}} </h1>
        
        @if(session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <form action=" {{ route('notas.update', $nota->id) }} " method="POST">
            <!-- Esto es para utilizar el metodo de PUT -->
            @method('PUT')
            <!-- Token de seguridad -->
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

            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $nota->nombre }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ $nota->descripcion }}">
            <button class="btn btn-warning" type="submit">Actualizar</button>
        </form>
        <br>
    </div>
@endsection