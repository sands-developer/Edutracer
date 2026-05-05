<?php
session_start();
include("../conexion.php");

$id = $_GET['id'];

$sql = "SELECT e.nombre, e.correo_acudiente, n.materia, n.nota
        FROM notas n
        JOIN estudiantes e ON n.estudiante_id = e.id
        WHERE n.id = $id";

$res = $conexion->query($sql);
$data = $res->fetch_assoc();

$to = $data['correo_acudiente'];
$subject = "Alerta de bajo rendimiento académico";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: EduTracer <tu_correo@gmail.com>\r\n";

$message = '
<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9; padding:20px;">
<tr>
<td align="center">

    <table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; overflow:hidden;">

        <!-- HEADER -->
        <tr>
            <td style="background:#2c3e50; color:white; padding:20px; text-align:center;">
                <h2 style="margin:0;">EduTracer</h2>
                <p style="margin:5px 0 0;">Alerta Académica</p>
            </td>
        </tr>

        <!-- BODY -->
        <tr>
            <td style="padding:20px; color:#333;">

                <p>Estimado acudiente,</p>

                <p>
                El estudiante <strong>'.$data['nombre'].'</strong> presenta bajo rendimiento académico.
                </p>

                <table width="100%" style="margin:15px 0;">
                    <tr>
                        <td><strong>Materia:</strong></td>
                        <td>'.$data['materia'].'</td>
                    </tr>
                    <tr>
                        <td><strong>Nota:</strong></td>
                        <td style="color:#e74c3c;"><strong>'.$data['nota'].'</strong></td>
                    </tr>
                </table>

                <p>
                Se recomienda realizar seguimiento y acompañamiento académico.
                </p>

                <!-- BOTÓN (visual) -->
                <div style="text-align:center; margin-top:20px;">
                    <a href="#" style="
                        background:#3498db;
                        color:white;
                        padding:10px 20px;
                        text-decoration:none;
                        border-radius:5px;
                        display:inline-block;
                    ">
                        Ver Detalle
                    </a>
                </div>

            </td>
        </tr>

        <!-- FOOTER -->
        <tr>
            <td style="background:#ecf0f1; padding:15px; text-align:center; font-size:12px; color:#555;">
                EduTracer - Plataforma de Gestión Académica
            </td>
        </tr>

    </table>

</td>
</tr>
</table>

</body>
</html>
';

if (mail($to, $subject, $message, $headers)) {
    $_SESSION['mensaje'] = "Notificación enviada correctamente ✔";
} else {
    $_SESSION['mensaje'] = "Error al enviar la notificación ❌";
}

session_write_close();
header("Location: /edutracer/notas/listar.php");
exit();
?>