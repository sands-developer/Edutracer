<?php include("../conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Nota</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="fondo">

    <div class="overlay">

        <div class="contenido">

            <h1>Registrar Nota</h1>

            <div class="form-container">

                <form action="guardar.php" method="POST">

                    <label>Estudiante:</label>
                    <select name="estudiante_id" required>
                        <option value="">Seleccione un estudiante</option>
                        <?php
                        $res = $conexion->query("SELECT * FROM estudiantes");
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                        }
                        ?>
                    </select>

                    <label>Materia:</label>
                    <input type="text" name="materia" placeholder="Ej: Matemáticas" required>

                    <label>Nota:</label>
                    <input type="number" step="0.1" name="nota" placeholder="Ej: 4.5" required>

                    <button class="btn-form" type="submit">Guardar Nota</button>

                </form>

            </div>

            <a class="btn-volver" href="../index.php">⬅ Volver al menú</a>

        </div>

    </div>

</div>

</body>
</html>