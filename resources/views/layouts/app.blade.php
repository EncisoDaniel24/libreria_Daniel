<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Uso de Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Uso de Bootstrap JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Uso de FontAwesome -->
    <script src="https://kit.fontawesome.com/aaddff1e66.js" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="container p-5 my-5 border">
        <!-- USo de yield para manejar el contenido del archivo  -->
        @yield('content') <!--  HAce referencia a la funcion Yield -->
    </div>


</body>
</html>