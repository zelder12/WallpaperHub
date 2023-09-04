<?php
$targetDirectory = "uploads/"; // Carpeta donde se almacenarán las imágenes cargadas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Limita el tamaño del archivo a 5MB
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Lo siento, el archivo es demasiado grande.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        // Si todo está bien, intenta subir el archivo
        $uploadedFileName = basename($_FILES["image"]["name"]);
        $targetFile = $targetDirectory . $uploadedFileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "El archivo " . $uploadedFileName . " ha sido cargado correctamente.";
            // Almacena la ruta de la imagen cargada en una matriz o base de datos
            $uploadedImages[] = $targetFile;
        } else {
            echo "Hubo un error al cargar tu archivo.";
        }
    }
}

// Mostrar las imágenes cargadas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/sex.png" type="image/png">
    <link rel="stylesheet" href="cssuser.css">
    <title>WallpaperHub</title>
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
        
        
        
        <!-- Formulario para cargar imágenes -->
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" required>
            <input type="submit" value="Subir Imagen" name="upload">
        </form>

        <?php
        // Mostrar las imágenes cargadas
        if (!empty($uploadedImages)) {
            echo "<h3>Imágenes cargadas:</h3>";
            foreach ($uploadedImages as $imagePath) {
                echo '<img src="' . $imagePath . '" alt="Imagen Cargada">';
            }
        }
        ?>
    </main>
</body>
</html>

