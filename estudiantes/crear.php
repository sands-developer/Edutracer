<!DOCTYPE html>
<html>
<head>
    <title>Registrar Estudiante</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="fondo">

    <div class="overlay">

        <div class="contenido">

            <h1>Registrar Estudiante</h1>

            <div class="form-container">

                <form action="guardar.php" method="POST">

                    <input type="text" name="nombre" placeholder="Nombre completo" required>

                    <input type="text" name="documento" placeholder="Documento" required>

                    <input type="text" name="grado" placeholder="Grado" required>
                    
                    <input type="email" name="correo_acudiente" placeholder="Correo del acudiente" required>

                    <button class="btn-form" type="submit">Guardar Estudiante</button>

                </form>

            </div>

            <a class="btn-volver" href="../index.php">⬅ Volver al menú</a>

        </div>

    </div>

</div>

</body>
</html>