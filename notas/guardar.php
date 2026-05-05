<?php
include("../conexion.php");

$estudiante_id = $_POST['estudiante_id'];
$materia = $_POST['materia'];
$nota = $_POST['nota'];

$sql = "INSERT INTO notas (estudiante_id, materia, nota)
        VALUES ('$estudiante_id', '$materia', '$nota')";

$conexion->query($sql);

header("Location: listar.php");
?>