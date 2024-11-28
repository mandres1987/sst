<?php
$servidor = "127.0.0.1";
$usuario = "micro";
$clave = "micro_itc";
$bd = "ejemplo";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $clave, $bd);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consultar datos
$sql = "SELECT * FROM usuarios"; // Cambia 'usuarios' por tu tabla
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar datos
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . "<br>"; // Cambia según tus columnas
    }
} else {
    echo "0 resultados";
}

$conexion->close();
?>
