<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción del Código</title>
    <!-- Agrega enlaces a tus archivos CSS y JS aquí -->
</head>
<body>
    <h1>Descripción del Código</h1>
    <p>El siguiente código contiene scripts jQuery para manejar eventos de clic, desplazamiento de página y validación de inicio de sesión.</p>
    <h2>Funcionalidades:</h2>
    <ul>
        <li><strong>Menú de navegación adaptable:</strong> Utiliza un ícono de hamburguesa para mostrar u ocultar un menú de navegación al hacer clic.</li>
        <li><strong>Resaltar enlace activo:</strong> Resalta el enlace de navegación correspondiente a la sección visible en la página mientras se desplaza hacia abajo.</li>
        <li><strong>Validación de inicio de sesión:</strong> Verifica el nombre de usuario y la contraseña ingresados y redirige a una página de destino si son correctos, o muestra un mensaje de error si no lo son.</li>
    </ul>
    <h2>Código jQuery:</h2>
    <pre><code>
$(document).ready(function(){
    $('.fa-bars').click(function() {
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    })
    
    $(window).on('scroll load', function() {
        $('.fa-bars').removeClass('fa-times');
        $('.navbar').removeClass('nav-toggle');
        
        $('section').each(function() {
            var id = $(this).attr('id');
            var height = $(this).height();
            var offset = $(this).offset().top -200;
            var top = $(window).scrollTop();
            if(top >= offset && top < offset + height) {
                $('.navbar ul li a').removeClass('active')
                $('.navbar').find('[href="#'+id+'"]').addClass('active')
            }
        });
    });

    // Función validarLogin
    function validarLogin() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Aquí puedes agregar la lógica para verificar el usuario y contraseña

        if (username === 'usuario' && password === 'contraseña') {
            window.location.href = 'pagina-de-destino.html'; // Redirige a la página de destino si el inicio de sesión es correcto
        } else {
            document.getElementById('mensajeError').style.display = 'block'; // Muestra el mensaje de error si el inicio de sesión es incorrecto
        }
    }
});
    </code></pre>
</body>
</html>
