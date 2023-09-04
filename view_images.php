<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/sex.png" type="image/png">
    <link rel="stylesheet" href="cssuser.css">
    <title>WallpaperHub</title>
    <style>
        /* Estilos CSS para el efecto de borrosidad y botones */
        .image-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .image-container {
            position: relative;
            width: 23%; /* Ajusta el ancho según tus preferencias */
            margin: 1%;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #f9f9f9;
            transition: filter 0.3s;
        }

        .image-container:hover img {
            filter: blur(5px); /* Aplica el efecto de borrosidad al pasar el cursor */
        }

        .image-container .image-actions {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: none;
            background: rgba(0, 0, 0, 0.7);
            transition: background 0.3s;
        }

        .image-container:hover .image-actions {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .image-actions button {
            background-color: #007BFF;
            color: #fff;
            padding: 5px 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }

        .image-actions button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="imagenes/logo.png" alt="Logo de Wallpaper Hub">
        </div>
        <h1>Imagenes de usuarios</h1>
    </header>
    <main>
        <nav class="nav-container">
            <a href="index.html" class="nav-link">
                <img src="imagenes/regre.png" alt="Anime">
            </a>
        </nav>
        <h2 style="text-align:center;">Galería de imágenes de usuarios</h2>
        <div class="image-list">
            <?php
            // Ruta a la carpeta donde se almacenan las imágenes cargadas
            $targetDirectory = "uploads/";

            // Obtener una lista de archivos en la carpeta de imágenes
            $fileList = glob($targetDirectory . '*');

            // Mostrar cada imagen en la lista con botones para eliminar o guardar
            foreach ($fileList as $image) {
                echo '<div class="image-container">';
                echo '<img src="' . $image . '" alt="Imagen Cargada">';
                echo '<div class="image-actions">';
                echo '<form method="POST" action="eliminar.php">'; // Agrega un formulario para eliminar
                echo '<input type="hidden" name="image_path" value="' . $image . '">';
                echo '<button type="submit" class="delete-button">Eliminar</button>';
                echo '</form>';
                echo '<form method="POST" action="tu_script.php">'; // Agrega un formulario para descargar la imagen
                echo '<input type="hidden" name="image_path" value="' . $image . '">';
                echo '<button type="submit" class="dowload-button">Guardar</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
</body>
</html>

