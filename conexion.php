<?php
// conexion.php
// Archivo encargado de establecer la conexion con la base de datos MySQL

$host = '127.0.0.1';
$dbname = 'arquitectura'; // Cambia esto por el nombre de tu base de datos cuando la crees
$username = 'root';           // Usuario por defecto en entornos locales como XAMPP o Laragon
$password = 'Halo_Infinite117';               // Contrasena por defecto (usualmente vacia en local)

try {
    // Se crea una nueva instancia de PDO para conectar a MySQL
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Se configura PDO para que lance excepciones (errores) si algo falla
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la conexion falla, se detiene el script y muestra el error
    die("Error de conexion a la base de datos: " . $e->getMessage());
}
?>
