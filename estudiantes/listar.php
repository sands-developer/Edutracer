<?php include("../conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="fondo">

    <div class="overlay">

        <div class="contenido">

            <h1>Lista de Estudiantes</h1>

            <div class="tabla-container">

                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Grado</th>
                    </tr>

                    <?php
                    $resultado = $conexion->query("SELECT * FROM estudiantes");

                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>
                                <td>{$fila['nombre']}</td>
                                <td>{$fila['documento']}</td>
                                <td>{$fila['grado']}</td>
                              </tr>";
                    }
                    ?>

                </table>

            </div>

            <br>

            <a class="btn-grande" href="crear.php">+ Nuevo Estudiante</a>
            <a class="btn-volver" href="../index.php">⬅ Volver al menú</a>

        </div>

    </div>

</div>

</body>
</html>