<?php
    // Definir los detalles de la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "paginas";

    // Conectar a la base de datos
    $coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

    // Verificar la conexión
    if (!$coneccion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Procesar el formulario cuando se envía
    if(isset($_POST['enviar'])){
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        // Crear la consulta de inserción y especificar los nombres de las columnas
        $insertar = "INSERT INTO user (nombre, apellido, edad, correo, telefono) VALUES ('$nombre', '$apellido', '$edad', '$correo', '$telefono')";

        // Ejecutar la consulta de inserción
        if (mysqli_query($coneccion, $insertar)) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos: " . mysqli_error($coneccion);
        }
    }
?>
