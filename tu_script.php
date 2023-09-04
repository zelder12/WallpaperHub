<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["image_path"])) {
        $imagePath = $_POST["image_path"];

        if (file_exists($imagePath)) {
            // Configurar las cabeceras para la descarga
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($imagePath));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($imagePath));

            // Leer el archivo y enviarlo al navegador
            readfile($imagePath);
            exit;
        } else {
            echo "La imagen no existe.";
        }
    } else {
        echo "No se proporcionó la ruta de la imagen.";
    }
} else {
    echo "Acceso no válido.";
}
?>
