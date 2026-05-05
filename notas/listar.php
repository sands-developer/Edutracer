<?php 
session_start();
include("../conexion.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notas de Estudiantes</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="fondo">

    <div class="overlay">

        <div class="contenido">

            <h1>Notas de Estudiantes</h1>

            <div class="tabla-container">
                <?php if (isset($_SESSION['mensaje'])): ?>
                    <script>
                        Swal.fire({
                            icon: '<?php echo (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "error") ? "error" : "success"; ?>',
                            title: '<?php echo $_SESSION["mensaje"]; ?>',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    </script>
                    <?php 
                        unset($_SESSION['mensaje']); 
                        unset($_SESSION['tipo']);
                    ?>
                <?php endif; ?>
                <table>
                    <tr>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Nota</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>

                    <?php
                    $sql = "SELECT n.id, e.nombre, n.materia, n.nota
                            FROM notas n
                            JOIN estudiantes e ON n.estudiante_id = e.id";

                    $res = $conexion->query($sql);

                    if ($res->num_rows > 0) {

                        while ($row = $res->fetch_assoc()) {

                            $nota = $row['nota'];


                            if ($nota < 3) {
                                $estado = "<span class='estado-bajo'>Bajo</span>";
                                $boton = "<a class='btn-small' href='notificar.php?id={$row['id']}'>Notificar</a>";
                            } elseif ($nota < 4) {
                                $estado = "<span class='estado-medio'>Medio</span>";
                                $boton = "-";
                            } else {
                                $estado = "<span class='estado-alto'>Alto</span>";
                                $boton = "-";
                            }

                            echo "<tr>
                                    <td>{$row['nombre']}</td>
                                    <td>{$row['materia']}</td>
                                    <td>{$nota}</td>
                                    <td>$estado</td>
                                    <td>$boton</td>
                                  </tr>";
                        }

                    } else {
                        echo "<tr><td colspan='4'>No hay notas registradas</td></tr>";
                    }
                    ?>

                </table>

            </div>

            <br>

            <a class="btn-grande" href="crear.php">+ Registrar Nota</a>
            <a class="btn-volver" href="../index.php">⬅ Volver al menú</a>

        </div>

    </div>

</div>

</body>
</html>