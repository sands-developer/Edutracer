<?php
include("../conexion.php");

$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$grado = $_POST['grado'];
$correo = $_POST['correo_acudiente'];

$sql = "INSERT INTO estudiantes (nombre, documento, grado, correo_acudiente)
        VALUES ('$nombre', '$documento', '$grado', '$correo')";

$conexion->query($sql);

header("Location: listar.php");
?>