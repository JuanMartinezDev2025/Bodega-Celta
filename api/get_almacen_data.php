<?php
header('Content-Type: application/json');

// Configurar tiempo de ejecución mayor para operaciones largas
set_time_limit(300);

// Abrir stream directamente a la API externa
$handle = fopen('http://129.146.161.23/BackEnd_Orion/datos_almacen.php?lista', 'r');

if ($handle) {
    // Enviar los datos en trozos
    while (!feof($handle)) {
        echo fread($handle, 8192); // Leer en bloques de 8KB
        ob_flush();
        flush();
    }
    fclose($handle);
}