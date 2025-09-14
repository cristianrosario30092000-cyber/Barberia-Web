<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $nombre   = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion= htmlspecialchars($_POST['direccion']);
    $correo   = htmlspecialchars($_POST['correo']);
    $mensaje  = htmlspecialchars($_POST['mensaje']);

    // Destinatario (tu correo)
    $destinatario = "cristianrosario30092000@gmail.com"; // <-- cámbialo por tu correo

    // Asunto del correo
    $asunto = "Nueva cita de la Barbería - $nombre";

    // Cuerpo del mensaje
    $contenido = "
    Has recibido un nuevo mensaje desde el formulario de la Barbería:

    Nombre: $nombre
    Teléfono: $telefono
    Dirección: $direccion
    Correo: $correo
    Mensaje: $mensaje
    ";

    // Encabezados
    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<script>alert('✅ Mensaje enviado correctamente');window.history.back();</script>";
    } else {
        echo "<script>alert('❌ Error al enviar el mensaje');window.history.back();</script>";
    }
} else {
    echo "Acceso no permitido";
}
?>
