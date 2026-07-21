<?php
// index.php
// Archivo principal que muestra la interfaz y procesa la busqueda

// Incluimos el archivo de conexion a la base de datos
require_once 'conexion.php';

$mensaje = "";
$usuarioEncontrado = null;

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreABuscar = $_POST["nombre_usuario"];

    if (!empty($nombreABuscar)) {
        try {
            // Preparamos la consulta SQL usando LIKE para busquedas parciales
            // Asumo que la tabla se llama 'usuarios'
            $sql = "SELECT * FROM usuarios WHERE nombre LIKE :nombre";
            $consulta = $conexion->prepare($sql);
            
            // Ejecutamos la consulta agregando % para que busque coincidencias
            $consulta->execute(['nombre' => '%' . $nombreABuscar . '%']);
            
            // Obtenemos el resultado de la base de datos
            $usuarioEncontrado = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuarioEncontrado) {
                $mensaje = "Usuario encontrado con exito.";
            } else {
                $mensaje = "No se encontro ningun usuario con el nombre ingresado.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al realizar la consulta: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<!-- Definimos el tipo de documento como HTML5 -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Título que aparece en la pestaña del navegador -->
    <title>Consulta de Usuario PHP</title>
    <style>
        /* Estilos generales para el cuerpo de la página */
        body { 
            font-family: Times, sans-serif; /* Tipo de letra principal */
            margin: 0; /* Quitamos márgenes por defecto del navegador */
            min-height: 100vh; /* Altura mínima del 100% de la ventana (Viewport Height) */
            display: flex; /* Usamos flexbox para centrar elementos */
            justify-content: center; /* Centramos horizontalmente */
            align-items: center; /* Centramos verticalmente */
            background-color: #f4f4f9; /* Color de fondo gris claro */
            font-size: 22px; /* Letra base más grande */
        }
        h2 {
            font-size: 2.2em; /* Título más grande */
        }
        /* Estilos para el campo de texto y el botón */
        input[type="text"], button {
            font-size: 22px; /* Aumentar el tamaño de la letra */
            font-family: inherit; /* Hereda la fuente (Times) del body */
        }
        /* Estilos de la "caja" blanca donde va el formulario */
        .contenedor { 
            width: 100%; /* Ocupa todo el ancho posible... */
            max-width: 800px; /* ...pero hasta un máximo de 800 píxeles */
            min-height: 400px; /* Altura mínima para que no se vea aplastado */
            padding: 40px; /* Espacio interior entre el borde y el contenido */
            border: 1px solid #ccc; /* Borde gris sutil */
            border-radius: 10px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para darle relieve 3D */
            box-sizing: border-box; /* Asegura que el padding no aumente el ancho total */
            margin: 20px; /* Margen exterior para que no toque los bordes en pantallas pequeñas */
            display: flex;
            flex-direction: column; /* Apilamos los elementos verticalmente (de arriba a abajo) */
            justify-content: center; /* Centra el contenido interior verticalmente */
        }
        /* Separación inferior para la zona del formulario */
        .formulario { margin-bottom: 20px; }
        /* Estilos para la caja verde de resultados */
        .resultado { padding: 25px; border: 1px solid #4CAF50; background-color: #f9fdf9; border-radius: 10px; line-height: 1.6; }
        /* Estilo para los mensajes de error (en caso de usarse) */
        .error { color: red; }
    </style>
</head>
<body>

<!-- Contenedor principal de la aplicación centrado en pantalla -->
<div class="contenedor">
    <h2>Buscar Usuario</h2>
    
    <!-- Sección del formulario de búsqueda -->
    <div class="formulario">
        <!-- El formulario envía los datos por el método POST a esta misma página (index.php) -->
        <form method="POST" action="index.php">
            <label for="nombre_usuario">Nombre de Usuario:</label><br><br>
            <!-- Campo de texto requerido donde el usuario escribe lo que busca -->
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!-- Verificamos si hay algún mensaje (error o éxito) desde PHP para mostrarlo -->
    <?php if ($mensaje != ""): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>

    <!-- Si se encontró el usuario en la base de datos, mostramos su información -->
    <?php if ($usuarioEncontrado): ?>
        <div class="resultado">
            <h3>Datos del Usuario Obtenidos:</h3>
            <ul>
                <!-- Imprimimos los datos que devuelve MySQL -->
                <li><strong>Nombre:</strong> <?php echo htmlspecialchars($usuarioEncontrado['nombre']); ?></li>
                <li><strong>Correo:</strong> <?php echo htmlspecialchars($usuarioEncontrado['correo']); ?></li>
                <li><strong>Edad:</strong> <?php echo htmlspecialchars($usuarioEncontrado['edad']); ?></li>
            </ul>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
