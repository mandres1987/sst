<?php
// Configuración de la conexión a la base de datos
$servidor = "127.0.0.1"; 
$usuario = "micro";
$contraseña = "micro_itc";
$base_datos = "ats_db";

// Establecer la conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $contraseña, $base_datos);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger los datos del formulario y evitar valores vacíos
$ats_numero = $_POST['ats_numero'] ?? '';
$permiso_trabajo_numero = $_POST['permiso_trabajo_numero'] ?? '';
$area_trabajo = $_POST['area_trabajo'] ?? '';
$contratista = $_POST['contratista'] ?? '';
$trabajo_realizar = $_POST['trabajo_realizar'] ?? '';
$autorizado_por = $_POST['autorizado_por'] ?? '';
$fecha_inicio = $_POST['fecha_inicio'] ?? '';
$hora_inicio = $_POST['hora_inicio'] ?? '';
$fecha_finalizacion = $_POST['fecha_finalizacion'] ?? '';
$hora_finalizacion = $_POST['hora_finalizacion'] ?? '';
$equipos = isset($_POST['equipos']) ? implode(', ', $_POST['equipos']) : '';
$otros_equipos = $_POST['otros_equipos'] ?? '';
$autorizada = $_POST['autorizada'] ?? '';
$riesgos = $_POST['riesgos'] ?? '';
$epp = $_POST['epp'] ?? '';
$equipos_necesarios = $_POST['equipos_necesarios'] ?? '';
$bloqueos = $_POST['bloqueos'] ?? '';
$comunicacion = $_POST['comunicacion'] ?? '';
$senalizacion = $_POST['senalizacion'] ?? '';
$orden = $_POST['orden'] ?? '';
$entender = $_POST['entender'] ?? '';
$saber = $_POST['saber'] ?? '';
$drogas = $_POST['drogas'] ?? '';
$salud = $_POST['salud'] ?? '';
$trabajos_peligrosos = isset($_POST['trabajos']) ? implode(', ', $_POST['trabajos']) : '';

// Consulta SQL utilizando sentencias preparadas
$sql = $conn->prepare("INSERT INTO ats_form (ats_numero, permiso_trabajo_numero, area_trabajo, contratista, trabajo_realizar, autorizado_por, 
                       fecha_inicio, hora_inicio, fecha_finalizacion, hora_finalizacion, equipos, autorizada, riesgos, epp,
                       equipos_necesarios, bloqueos, comunicacion, senalizacion, orden, entender, saber, drogas, salud, trabajos_peligrosos) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Vincular las variables con la consulta preparada
$sql->bind_param("ssssssssssssssssssssssss", $ats_numero, $permiso_trabajo_numero, $area_trabajo, $contratista, $trabajo_realizar, 
                 $autorizado_por, $fecha_inicio, $hora_inicio, $fecha_finalizacion, $hora_finalizacion, $equipos, $autorizada, 
                 $riesgos, $epp, $equipos_necesarios, $bloqueos, $comunicacion, $senalizacion, $orden, $entender, $saber, 
                 $drogas, $salud, $trabajos_peligrosos);

// Ejecutar la consulta y verificar si se inserta correctamente
if ($sql->execute()) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql->error;
}

// Cerrar la conexión
$sql->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración del documento -->
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace el diseño responsivo -->
    <title>Formato ATS</title> <!-- Título que se mostrará en la pestaña del navegador -->

    <style>
        /* Estilos generales del cuerpo de la página */
        body {
            font-family: 'Arial', sans-serif; /* Tipo de fuente */
            background-color: #f4f6f9; /* Color de fondo */
            margin: 0; /* Eliminar márgenes predeterminados */
            padding: 10px; /* Añadir un pequeño padding */
            font-size: 12px; /* Reducir el tamaño de la fuente global */
        }
	.container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .options {
            text-align: center;
        }

        .options label {
            margin-right: 10px;
            font-weight: normal;
        }

        input[type="radio"] {
            margin: 0 5px;
        }
        /* Estilo de la sección del encabezado */
        .header-section {
            display: flex; /* Usamos Flexbox para organizar los elementos dentro de esta sección */
            justify-content: center; /* Centra los elementos horizontalmente */
            align-items: center; /* Alinea los elementos verticalmente */
            margin-bottom: 15px; /* Espacio debajo del encabezado */
            text-align: center; /* Centra el texto */
        }

        .header-section h1 {
            font-size: 18px; /* Tamaño de la fuente del título */
            color: #4CAF50; /* Color verde para el título */
            margin: 0; /* Eliminar márgenes alrededor del título */
        }

        .header-section .compact-section-right {
            display: flex;
            flex-direction: column; /* Disposición de los elementos en columna */
            align-items: flex-end; /* Alinea los elementos a la derecha */
            margin-left: 15px; /* Espacio a la izquierda */
        }

         /* Cambiar la alineación a la izquierda y mover más cerca del borde */
     /* Cambiar la alineación a la derecha */
    .header-section {
        display: flex;
        justify-content: flex-end; /* Alineación a la derecha */
        align-items: flex-start;
        margin: 0; /* Eliminar márgenes */
    }
	   .header-section {
        display: flex;
        justify-content: center; /* Centra los elementos dentro de .header-section */
        align-items: center;
        margin-bottom: 15px;
        width: 100%;
    }

    .header-title {
        text-align: center; /* Alinea el texto dentro del contenedor a la izquierda */
        flex: 1; /* Asegura que ocupe el espacio disponible */
    }

    .header-title h1 {
        font-size: 18px;
        color: #4CAF50;
        margin: 0;
    }
      /* Alineación a la derecha para la sección compacta */
    .compact-section-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        margin-left: 15px;
    }

    .inline-group {
        margin-bottom: 4px; /* Reducido el espacio entre los campos */
    }

    .inline-group label {
        font-size: 12px; /* Mantener el tamaño pequeño para las etiquetas */
        color: #333;
        margin-bottom: 2px;
    }

    .inline-group input {
        width: 100px; /* Reducir el ancho de los campos */
        font-size: 12px; /* Mantener el tamaño pequeño para los campos */
        padding: 4px;
        border: 1px solid #ccc;
        border-radius: 3px;
    
    }

        /* Estilo de los inputs pequeños */
        .small-input {
            width: 120px; /* Ancho pequeño de los campos */
            padding: 4px; /* Padding pequeño */
            font-size: 12px; /* Tamaño de la fuente reducido */
            border: 1px solid #ccc; /* Borde de color gris claro */
            border-radius: 3px; /* Bordes redondeados */
        }

        /* Estilo del contenedor principal */
        .container {
            max-width: 900px; /* Ancho máximo del contenedor */
            margin: auto; /* Centrado automático */
            background-color: white; /* Fondo blanco */
            padding: 15px; /* Espaciado interno */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave alrededor del contenedor */
        }

        /* Estilo para las secciones */
        .section {
            margin-bottom: 20px; /* Espacio entre secciones */
        }

        /* Estilo para los encabezados de las secciones */
        .section h2 {
            background-color: #4CAF50; /* Fondo verde para el título */
            color: white; /* Color de texto blanco */
            padding: 8px; /* Padding alrededor del título */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 14px; /* Tamaño pequeño para los títulos */
            margin-bottom: 10px; /* Espacio debajo del título */
        }

        /* Estilo de las tablas */
        table {
            width: 100%; /* Ancho completo de la tabla */
            border-collapse: collapse; /* Eliminar los espacios entre celdas */
            margin-bottom: 10px; /* Espacio debajo de la tabla */
        }

        th, td {
            border: 1px solid #ddd; /* Borde gris claro para celdas */
            padding: 8px; /* Padding pequeño en celdas */
            text-align: left; /* Alineación de texto a la izquierda */
            font-size: 12px; /* Tamaño de la fuente pequeño */
        }

        th {
            background-color: #f2f2f2; /* Fondo gris claro para los encabezados */
        }

        input[type="text"], input[type="checkbox"], select, textarea {
            width: 100%; /* Ancho completo para inputs y selects */
            padding: 6px; /* Padding en los campos */
            margin: 4px 0; /* Margen superior e inferior */
            border-radius: 4px; /* Bordes redondeados */
            border: 1px solid #ccc; /* Borde gris claro */
            font-size: 12px; /* Tamaño de la fuente pequeño */
        }

        /* Estilo para los grupos de checkboxes */
        .checkbox-group {
            display: flex; /* Flexbox para los checkboxes */
            flex-wrap: wrap; /* Permite que los checkboxes se acomoden en varias filas */
            gap: 8px; /* Espacio entre checkboxes */
        }

        .checkbox-group label {
            display: flex; /* Flexbox para alinear los inputs con las etiquetas */
            align-items: center; /* Alineación vertical de los checkboxes y etiquetas */
            margin: 3px 0; /* Espacio entre checkboxes */
            width: 45%; /* Ancho limitado para cada label */
        }

        .checkbox-group input {
            width: auto; /* Ancho automático para los checkboxes */
            margin-right: 8px; /* Espacio a la derecha de los checkboxes */
        }

        /* Estilos para el botón */
        button {
            background-color: #4CAF50; /* Color de fondo verde */
            color: white; /* Color de texto blanco */
            border: none; /* Sin borde */
            padding: 8px 16px; /* Espaciado interno del botón */
            font-size: 14px; /* Tamaño de la fuente */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambio del cursor al pasar por encima */
            margin-top: 10px; /* Margen superior */
        }

        /* Estilo cuando el botón es presionado */
        button:hover {
            background-color: #45a049; /* Cambio de color cuando se pasa el ratón */
        }

        /* Estilo para las acciones del formulario */
        .form-actions {
            text-align: center; /* Centra el contenido de las acciones */
        }

        .form-actions button {
            width: 140px; /* Ancho fijo para los botones en la sección de acciones */
            font-size: 14px; /* Tamaño de la fuente */
        }

        /* Estilo para la tabla de acciones */
        .table-actions {
            text-align: center; /* Centra las acciones de la tabla */
            margin-top: 10px; /* Espacio superior */
        }

        .table-actions button {
            width: auto; /* Ancho automático */
        }

        /* Estilo para el área de texto */
        .section textarea {
            height: 100px; /* Altura fija para el área de texto */
        }
		
        /* Asegura que los inputs dentro de las tablas ocupen todo el ancho disponible */
        table input, table select, table textarea {
            width: 100%;
            box-sizing: border-box; /* Incluye el padding y borde en el tamaño del elemento */
        }
    </style>
</head>
<body>

<!-- Sección del encabezado -->
<div class="header-section">
    <div class="header-title">
        <h1>Formato de Análisis de Trabajo Seguro (ATS)</h1>
    </div>
    <div class="compact-section-right">
        <div class="inline-group">
            <label for="ats-numero">ATS N°:</label>
            <input type="text" id="ats-numero" name="ats_numero" class="small-input" style="width: 100px;" required>
        </div>
        <div class="inline-group">
            <label for="permiso-trabajo-numero">Permiso de Trabajo N°:</label>
            <input type="text" id="permiso-trabajo-numero" name="permiso_trabajo_numero" class="small-input" style="width: 100px;" required>
        </div>
    </div>
</div>

<!-- Formulario para el ATS -->
<form action="guardar_ats.php" method="POST">
    <!-- Sección de información general -->
    <div class="section">
        <h2>Información General</h2>
        <table>
            <tr>
                <td>Área de Trabajo:</td>
                <td><input type="text" name="area_trabajo" required></td>
                <td>Contratista:</td>
                <td><input type="text" name="contratista" required></td>
            </tr>
            <tr>
                <td>Trabajo a Realizar:</td>
                <td colspan="3"><input type="text" name="trabajo_realizar" required></td>
            </tr>
            <tr>
                <td>Autorizado por:</td>
                <td colspan="3"><input type="text" name="autorizado_por" required></td>
            </tr>
        </table>
    </div>

    <!-- Sección de fechas y horas -->
    <div class="section">
        <h2>Fechas y Horas</h2>
        <table>
            <tr>
                <td>Fecha de Inicio:</td>
                <td><input type="date" name="fecha_inicio" required></td>
                <td>Hora de Inicio:</td>
                <td><input type="time" name="hora_inicio" required></td>
            </tr>
            <tr>
                <td>Fecha de Finalización:</td>
                <td><input type="date" name="fecha_finalizacion" required></td>
                <td>Hora de Finalización:</td>
                <td><input type="time" name="hora_finalizacion" required></td>
            </tr>
        </table>
    </div>

    <!-- Sección de equipos o herramientas a usar -->
    <div class="section">
        <h2>Equipos o Herramientas a Usar</h2>
        <div class="checkbox-group">
            <label><input type="checkbox" name="equipos[]" value="Soplete"> Soplete</label>
            <label><input type="checkbox" name="equipos[]" value="Máquina de soldar"> Máquina de soldar</label>
            <label><input type="checkbox" name="equipos[]" value="Moladora"> Moladora</label>
            <label><input type="checkbox" name="equipos[]" value="Taladros"> Taladros</label>
            <label><input type="checkbox" name="equipos[]" value="Esmeril"> Esmeril</label>
            <label><input type="checkbox" name="equipos[]" value="Sierras"> Sierras</label>
            <label><input type="checkbox" name="equipos[]" value="Alicates"> Alicates</label>
            <label><input type="checkbox" name="equipos[]" value="Otros"> Otros: <input type="text" name="otros_equipos"></label>
        </div>
    </div>
 <div class="container">
        <h1>Verificación Antes de Iniciar la Actividad</h1>
        <table>
            <thead>
                <tr>
                    <th>Criterios Generales</th>
                    <th class="options">SI</th>
                    <th class="options">NO</th>
                    <th class="options">N/A</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>¿Está autorizada la actividad?</td>
                    <td class="options"><input type="radio" name="autorizada" value="SI"></td>
                    <td class="options"><input type="radio" name="autorizada" value="NO"></td>
                    <td class="options"><input type="radio" name="autorizada" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Conoce los riesgos inherentes a la actividad?</td>
                    <td class="options"><input type="radio" name="riesgos" value="SI"></td>
                    <td class="options"><input type="radio" name="riesgos" value="NO"></td>
                    <td class="options"><input type="radio" name="riesgos" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se cuenta con los EPP’s requeridos para la actividad?</td>
                    <td class="options"><input type="radio" name="epp" value="SI"></td>
                    <td class="options"><input type="radio" name="epp" value="NO"></td>
                    <td class="options"><input type="radio" name="epp" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se cuenta con los equipos y herramientas necesarios?</td>
                    <td class="options"><input type="radio" name="equipos" value="SI"></td>
                    <td class="options"><input type="radio" name="equipos" value="NO"></td>
                    <td class="options"><input type="radio" name="equipos" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se realizaron los bloqueos necesarios?</td>
                    <td class="options"><input type="radio" name="bloqueos" value="SI"></td>
                    <td class="options"><input type="radio" name="bloqueos" value="NO"></td>
                    <td class="options"><input type="radio" name="bloqueos" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se comunicó la actividad a las demás áreas implicadas?</td>
                    <td class="options"><input type="radio" name="comunicacion" value="SI"></td>
                    <td class="options"><input type="radio" name="comunicacion" value="NO"></td>
                    <td class="options"><input type="radio" name="comunicacion" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se cuenta con señalización requerida?</td>
                    <td class="options"><input type="radio" name="senalizacion" value="SI"></td>
                    <td class="options"><input type="radio" name="senalizacion" value="NO"></td>
                    <td class="options"><input type="radio" name="senalizacion" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿El lugar está en condiciones adecuadas de orden y aseo?</td>
                    <td class="options"><input type="radio" name="orden" value="SI"></td>
                    <td class="options"><input type="radio" name="orden" value="NO"></td>
                    <td class="options"><input type="radio" name="orden" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Entiende la labor a ejecutar?</td>
                    <td class="options"><input type="radio" name="entender" value="SI"></td>
                    <td class="options"><input type="radio" name="entender" value="NO"></td>
                    <td class="options"><input type="radio" name="entender" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Sabe cómo realizar dicha labor?</td>
                    <td class="options"><input type="radio" name="saber" value="SI"></td>
                    <td class="options"><input type="radio" name="saber" value="NO"></td>
                    <td class="options"><input type="radio" name="saber" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se encuentra bajo la influencia de drogas o alcohol?</td>
                    <td class="options"><input type="radio" name="drogas" value="SI"></td>
                    <td class="options"><input type="radio" name="drogas" value="NO"></td>
                    <td class="options"><input type="radio" name="drogas" value="N/A"></td>
                </tr>
                <tr>
                    <td>¿Se siente bien de salud para ejecutar la actividad?</td>
                    <td class="options"><input type="radio" name="salud" value="SI"></td>
                    <td class="options"><input type="radio" name="salud" value="NO"></td>
                    <td class="options"><input type="radio" name="salud" value="N/A"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Sección de trabajos peligrosos -->
    <div class="section">
        <h2>Trabajos Considerados Peligrosos</h2>
        <div class="checkbox-group">
            <label><input type="checkbox" name="trabajos[]" value="Trabajos en caliente"> Trabajos en caliente</label>
            <label><input type="checkbox" name="trabajos[]" value="Trabajos en altura"> Trabajos en altura</label>
            <label><input type="checkbox" name="trabajos[]" value="Trabajos en zanjas"> Trabajos en zanjas y excavaciones</label>
            <label><input type="checkbox" name="trabajos[]" value="Espacios confinados"> Trabajos en espacios confinados</label>
            <label><input type="checkbox" name="trabajos[]" value="Equipos energizados"> Trabajos en equipos energizados</label>
            <label><input type="checkbox" name="trabajos[]" value="Trabajos en izaje de cargas"> Trabajos en izaje de cargas</label>
        </div>
    </div>

    <!-- Sección de tareas, riesgos y controles -->
    <div class="section">
        <h2>Tareas, Riesgos y Controles</h2>
        <table id="tareasTable">
            <tr>
                <th>Tarea</th>
                <th>Peligro</th>
                <th>Nivel de Riesgo</th>
                <th>Medidas de Control</th>
            </tr>
            <tr>
                <td><input type="text" name="tareas[]" required></td>
                <td><input type="text" name="peligros[]" required></td>
                <td>
                    <select name="niveles_riesgo[]" required>
                        <option value="Bajo">Bajo</option>
                        <option value="Medio">Medio</option>
                        <option value="Alto">Alto</option>
                    </select>
                </td>
                <td><textarea name="controles[]" required></textarea></td>
            </tr>
        </table>
        <div class="table-actions">
            <button type="button" onclick="agregarFila()">Agregar Fila</button>
        </div>
    </div>

    <!-- Sección de firmas de los trabajadores -->
    <div class="section">
        <h2>Firmas de los Trabajadores</h2>
        <textarea name="firmas" required></textarea>
    </div>

    <!-- Botón de envío del formulario -->
    <div class="form-actions">
        <button type="submit">Guardar</button>
    </div>
</form>

<script>
    // Función para agregar una nueva fila a la tabla de tareas
    function agregarFila() {
        const table = document.getElementById('tareasTable');
        const newRow = table.insertRow(-1);
        newRow.innerHTML = `        
            <td><input type="text" name="tareas[]" required></td>
            <td><input type="text" name="peligros[]" required></td>
            <td>
                <select name="niveles_riesgo[]" required>
                    <option value="Bajo">Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Alto">Alto</option>
                </select>
            </td>
            <td><textarea name="controles[]" required></textarea></td>
        `;
    }
</script>

</body>
</html>
