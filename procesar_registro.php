<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paginas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$edad = $_POST['edad'] ?? '';
$correo = $_POST['correo'] ?? '';
$telefono = $_POST['telefono'] ?? '';

// Verificar si se han proporcionado todos los datos obligatorios
if (empty($nombre) || empty($apellido) || empty($edad) || empty($correo) || empty($telefono)) {
    echo "Por favor complete todos los campos obligatorios del formulario.";
} else {
    // Crear la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, edad, correo, telefono) VALUES ('$nombre', '$apellido', '$edad', '$correo', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro completado con éxito.<br>";
        echo "Los datos que se guardaron son:<br>";
        echo "Nombre: " . $nombre . "<br>";
        echo "Apellido: " . $apellido . "<br>";
        echo "Edad: " . $edad . "<br>";
        echo "Correo: " . $correo . "<br>";
        echo "Teléfono: " . $telefono . "<br>";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
