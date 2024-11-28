<?php
// Configuración de la conexión a la base de datos
$servidor = "127.0.0.1"; 
$usuario = "micro";
$clave = "micro_itc";
$bd = "ejemplo";

// Establecer la conexión a la base de datos
$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

// Verificar si la conexión fue exitosa
if (!$coneccion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Verificar si los campos del formulario no están vacíos
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['edad']) && !empty($_POST['correo']) && !empty($_POST['telefono'])) {
        // Recuperar los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        // Crear una consulta preparada para insertar los datos en la base de datos
        $stmt = $coneccion->prepare("INSERT INTO datos (nombre, apellido, edad, correo, telefono) VALUES (?, ?, ?, ?, ?)");

        // Enlazar los parámetros a la consulta preparada
        $stmt->bind_param("ssiss", $nombre, $apellido, $edad, $correo, $telefono);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>alert('Datos Registrados');</script>";
        } else {
            echo "<script>alert('Error al registrar los datos');</script>";
        }
		if (!$coneccion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($coneccion);
?>

    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        /* Estilos para el cuerpo de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        /* Estilos para centrar el contenido del contenedor */
        .container {
            text-align: center;
        }
        /* Estilos para el formulario */
        form {
            max-width: 400px;
            margin: 0 auto;
 background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Agregar posición relativa para alinear la barra de progreso */
        }
        /* Estilos para los campos de entrada */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
    border-radius: 5px;
        }
        /* Estilos para el botón de enviar */
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
}
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        /* Estilos para la barra de progreso */
        .progress-bar {
            width: 0;
            height: 5px;
            background-color: #4CAF50;
            position: absolute;
            bottom: 0;
            left: 0;
 transition: width 0.3s ease; /* Agregar una transición suave para la barra de progreso */
        }
        /* Estilos para los mensajes de error */
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Contenedor del logo y el título -->
        <img src="images/hombre.png" alt="User Logo" width="100">
        <h2>Registro de Usuario</h2> <!-- Título del formulario -->
    </div>
    <!-- Formulario de registro -->
    <form method="post" id="registro-form">
        <!-- Campos de entrada -->
        <input type="text" name="nombre" placeholder="Nombre" required>
        <div class="error-message" id="nombre-error"></div> <!-- Mostrar mensaje de error para el nombre -->
        <input type="text" name="apellido" placeholder="Apellido" required>
        <div class="error-message" id="apellido-error"></div> <!-- Mostrar mensaje de error para el apellido -->
 <input type="text" name="edad" placeholder="Edad" required>
        <div class="error-message" id="edad-error"></div> <!-- Mostrar mensaje de error para la edad -->
        <input type="text" name="correo" placeholder="Correo electrónico" required>
        <div class="error-message" id="correo-error"></div> <!-- Mostrar mensaje de error para el correo -->
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <div class="error-message" id="telefono-error"></div> <!-- Mostrar mensaje de error para el teléfono -->
        <input type="submit" name="enviar" value="Enviar"> <!-- Botón de enviar -->
        <div class="progress-bar"></div> <!-- Barra de progreso -->
    </form>
<!-- Script JavaScript para la validación del formulario y la barra de progreso -->
    <script>
    // Seleccionar el formulario y la barra de progreso
    const form = document.getElementById('registro-form');
    const progressBar = document.querySelector('.progress-bar');

    // Obtener todos los campos de entrada
    const formFields = form.querySelectorAll('input[type="text"]');
    
    // Función para validar el nombre y el apellido (solo letras)
    function validarNombreApellido(input) {
        const regex = /^[a-zA-Z\s]*$/; // Expresión regular para letras y espacios
        return regex.test(input);
 }

    // Función para validar el teléfono y la edad (solo números)
    function validarNumero(input) {
        const regex = /^[0-9]+$/; // Expresión regular para números
        return regex.test(input);
    }
// Función para validar el correo electrónico
    function validarCorreo(input) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para correo electrónico
        return regex.test(input);
    }

    // Calcular el progreso y realizar validaciones
    function calcularProgreso() {
        let camposCompletados = 0;
        formFields.forEach(function(field) {
  if (field.value !== '') {
                // Validar según el nombre del campo
                switch (field.name) {
                    case 'nombre':
                    case 'apellido':
                        if (validarNombreApellido(field.value)) {
                            camposCompletados++;
                            ocultarError(field);
                        } else {
                            mostrarError(field, 'Solo se aceptan letras en este campo.');
                        }
                        break;
 case 'telefono':
                    case 'edad':
                        if (validarNumero(field.value)) {
                            camposCompletados++;
                            ocultarError(field);
                        } else {
                            mostrarError(field, 'Solo se aceptan números en este campo.');
                        }
                        break;
                    case 'correo':
                        if (validarCorreo(field.value)) {
                            camposCompletados++;
 ocultarError(field);
                        } else {
                            mostrarError(field, 'El correo electrónico debe tener un formato válido.');
                        }
                        break;
                    default:
                        camposCompletados++;
                }
            }
        });
        // Calcular el porcentaje de campos completados
 const progreso = (camposCompletados / formFields.length) * 100;
        // Actualizar el ancho de la barra de progreso
        progressBar.style.width = progreso + '%';
    }

    // Función para mostrar un mensaje de error
    function mostrarError(input, mensaje) {
        const errorElement = input.nextElementSibling; // Obtener el elemento hermano siguiente (mensaje de error)
        errorElement.textContent = mensaje; // Establecer el texto del mensaje de error
    }

    // Función para ocultar un mensaje de error
function ocultarError(input) {
        const errorElement = input.nextElementSibling; // Obtener el elemento hermano siguiente (mensaje de error)
        errorElement.textContent = ''; // Limpiar el texto del mensaje de error
    }

    // Escuchar eventos de entrada en los campos de entrada
    formFields.forEach(function(field) {
        field.addEventListener('input', calcularProgreso);
    });
</script>