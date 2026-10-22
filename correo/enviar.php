<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../config.php';
require __DIR__ . '/src/Exception.php';
require __DIR__ . '/src/PHPMailer.php';
require __DIR__ . '/src/SMTP.php';

function enviarTicket($destinatario, $nombreCliente, $pelicula, $sala, $horario, $asientos, $total, $codigo) {

    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASS; 

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('cinemagicneuquen@gmail.com', 'Cine Magic');
        $mail->addAddress($destinatario, $nombreCliente);

        $mail->isHTML(true);
        $mail->Subject = 'Tu ticket de Cine Magic #' . $codigo;

        $mail->Body = "
        <div style='font-family:Arial; padding:20px; border:1px solid #ccc; border-radius:10px;'>
            
            <div style='background-color:darkblue; color:white; padding:15px; text-align:center;'>
                <h2 style='margin:0;'>Cine Magic</h2>
                <p style='margin:5px 0;'>Gracias por tu compra</p>
            </div>

            <div style='padding:15px;'>
                <h3>Datos de tu ticket</h3>

                <p><strong>Codigo:</strong> #$codigo</p>
                <p><strong>Cliente:</strong> $nombreCliente</p>
                <p><strong>Película:</strong> $pelicula</p>
                <p><strong>Sala:</strong> $sala</p>
                <p><strong>Horario:</strong> $horario</p>
                <p><strong>Asientos:</strong> $asientos</p>
                <p><strong>Total:</strong> $$total</p>
                <p><strong>Presenta este comprobante en el cine.</strong></p>
            </div>
        </div>
        ";

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}