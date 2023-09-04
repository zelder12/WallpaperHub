<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la ruta de la imagen a eliminar desde el formulario
    $imagePath = $_POST["image_path"];

    // Verificar si la imagen existe
    if (file_exists($imagePath)) {
        // Intenta eliminar la imagen
        if (unlink($imagePath)) {
            // La imagen se ha eliminado con éxito
            echo "La imagen se ha eliminado correctamente.";
        } else {
            // Ocurrió un error al eliminar la imagen
            echo "Error al eliminar la imagen.";
        }
    } else {
        // La imagen no existe
        echo "La imagen no existe.";
    }
}
?>
