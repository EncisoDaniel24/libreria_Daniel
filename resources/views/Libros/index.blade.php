<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>LIBROS REGISTRADOS</h1>

    <div class="d-flex justify-content-end mb-2">
            <a href="{{route('libros.create')}}">
            <button class="btn btn-success me-3"><i class="fa-solid fa-plus"></i> Nuevo libro </button>
            </a>
            <form action="{{ route('cerrar') }}" method="POST">
                @csrf
                <button class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>Cerrar sesion</button>
            </form>
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">
                    Admin
                </a>
            @endif
    </div>

    @include('partials.alerts')
    
    <table class="table table-striped table-hover"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
        <tbody>
        <!--Usar blade para recorrer los registros "@"-->
            @foreach ($libros as $Libro)

            <tr>
                <!--VariableCiclo-BAse de datos-->
                <td>{{$Libro -> id}}</td>
                <td>{{$Libro -> nombre}}</td>
                <td>{{$Libro -> autor}}</td>       <!--Estos son los nombres de la base de datos-->
                <td>{{$Libro -> editorial }}</td>
                <td>{{$Libro -> precio}}</td>
                <td>
                    <!-- Boton para editar -->
                    <a href="{{route('libros.edit',$Libro) }}">
                        <button class="btn btn-warning">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>
                    
                    <form action="{{ route ('libros.destroy', $Libro)}}" method="POST" class="d-inline">  
                        @csrf
                        @method('DELETE')

                    <button 
                    class="btn btn-danger"
                    onclick="return confirm('¿Deseas eliminar el registro? ')"> 
                        <i class="fa-solid fa-trash"></i>   
                    </button>                


                    </form>

                </td>

            </tr>

            @endforeach
        </tbody>
</table>
    @endsection


</body>
</html>