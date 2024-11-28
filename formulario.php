<?php
// Configuración de la conexión a la base de datos
$servidor = "127.0.0.1"; 
$usuario = "micro";
$clave = "micro_itc";
$bd = "ats_db";

// Establecer la conexión a la base de datos
$coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);

// Verificar si la conexión fue exitosa
if (!$coneccion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperar los datos del formulario
$ats_numero = $_POST['ats_numero'];
$permiso_trabajo_numero = $_POST['permiso_trabajo_numero'];
$area_trabajo = $_POST['area_trabajo'];
$contratista = $_POST['contratista'];
$trabajo_realizar = $_POST['trabajo_realizar'];
$autorizado_por = $_POST['autorizado_por'];
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio = $_POST['hora_inicio'];
$fecha_finalizacion = $_POST['fecha_finalizacion'];
$hora_finalizacion = $_POST['hora_finalizacion'];
$equipos = isset($_POST['equipos']) ? implode(', ', $_POST['equipos']) : '';
$otros_equipos = $_POST['otros_equipos'] ? $_POST['otros_equipos'] : '';
$autorizada = $_POST['autorizada'];
$riesgos = $_POST['riesgos'];
$epp = $_POST['epp'];
$equipos_necesarios = $_POST['equipos_necesarios'];
$bloqueos = $_POST['bloqueos'];
$comunicacion = $_POST['comunicacion'];
$senalizacion = $_POST['senalizacion'];
$orden = $_POST['orden'];
$entender = $_POST['entender'];
$saber = $_POST['saber'];
$drogas = $_POST['drogas'];
$salud = $_POST['salud'];
$trabajos_peligrosos = isset($_POST['trabajos']) ? implode(', ', $_POST['trabajos']) : '';

// Crear una consulta preparada
$stmt = $coneccion->prepare("INSERT INTO ats_form (ats_numero, permiso_trabajo_numero, area_trabajo, contratista, trabajo_realizar, autorizado_por, 
                             fecha_inicio, hora_inicio, fecha_finalizacion, hora_finalizacion, equipos, autorizada, riesgos, epp,
                             equipos_necesarios, bloqueos, comunicacion, senalizacion, orden, entender, saber, drogas, salud, trabajos_peligrosos) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Enlazar los parámetros a la consulta
$stmt->bind_param("ssssssssssssssssssssss", $ats_numero, $permiso_trabajo_numero, $area_trabajo, $contratista, $trabajo_realizar, 
                  $autorizado_por, $fecha_inicio, $hora_inicio, $fecha_finalizacion, $hora_finalizacion, $equipos, 
                  $autorizada, $riesgos, $epp, $equipos_necesarios, $bloqueos, $comunicacion, $senalizacion, $orden, 
                  $entender, $saber, $drogas, $salud, $trabajos_peligrosos);

// Ejecutar la consulta
if ($stmt->execute()) {
