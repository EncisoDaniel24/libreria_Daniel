<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <h1>CATALOGO DE LIBROS</h1>
    <!-- DIV para ajustar la forma en la que se ven los libros en toda la pantallla -->
    <div style="display:flex; flex-wrap:wrap; gap:20px;">

        @foreach($libros as $libro)
        <!-- div para acomodar el tama;o de los libros -->
        <div style="widht:200px;">

            <!-- titulo libro -->
            <h3>
                {{ $libro['volumeInfo']['title'] ?? 'Sin titulo' }}
            </h3>
            <!-- Autores de libro -->
             <h3>
                {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }}
             </h3>
            <!-- Imagen del libro -->
            @if(isset($libro['volumeInfo']['imageLinks']['thumbnail']))
                <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] }}" alt="No hay xd">
            @endif
        </div>


        @endforeach

    </div>

</body>
</html>