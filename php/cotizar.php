<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function limpiar($dato) {
        return htmlspecialchars(strip_tags(trim($dato)));
    }

    $nombre     = limpiar($_POST["name"] ?? '');
    $correo     = limpiar($_POST["email"] ?? '');
    $telefono   = limpiar($_POST["phone"] ?? '');
    $empresa    = limpiar($_POST["company"] ?? '');
    $servicio   = limpiar($_POST["service"] ?? '');
    $descripcion= limpiar($_POST["description"] ?? '');
    $presupuesto= limpiar($_POST["budget"] ?? '');
    $tiempo     = limpiar($_POST["timeline"] ?? '');

    if (!$nombre || !$correo || !$servicio || !$descripcion) {
        echo "Por favor complete todos los campos obligatorios.";
        exit;
    }

    $destino = "munozrodger@gmail.com";
    $asunto = "Nueva Solicitud de Cotización - Codirix";

    $contenido = "
    Nombre: $nombre
    Correo: $correo
    Teléfono: $telefono
    Empresa: $empresa
    Servicio: $servicio
    Descripción: $descripcion
    Presupuesto estimado: $presupuesto
    Plazo estimado: $tiempo
    ";

    $headers = "From: $correo";

    if (mail($destino, $asunto, $contenido, $headers)) {
        echo "Solicitud enviada correctamente. Te responderemos pronto.";
    } else {
        echo "Hubo un error al enviar tu solicitud. Intenta más tarde.";
    }
} else {
    echo "Método no permitido.";
}
?>
