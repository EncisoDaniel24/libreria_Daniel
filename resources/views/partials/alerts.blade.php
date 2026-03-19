@if(session('success'))

    <div id="alert" class="alert alert-success alert-dismissible d-flex align-items-centeer fade show">
        <i class="fa-solid fa-circle-check"></i>
        <strong class="mx-2">¡Éxito!</strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(fuction(){
            // Declarar variable para obtener el elemento de alerta
            let alerta = document.getElementById('alert');
            // Validar si la alerta existe
            if(alerta){
                alerta.classList.remove('show');
                // Agregar animación
                alerta.classLisr.add('fade');
                // Eliminar el elemento del documento (DOM)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000)
    </script>

@endif