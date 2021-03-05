<?php
include("cn.php");

$typeDocumentClient = $_POST["typeDocumentClient"];
$numberDocumentClient = $_POST["numberDocumentClient"];
$nameClient = $_POST["nameClient"];
$lastNameClient = $_POST["lastNameClient"];
$addressClient = $_POST["addressClient"];
$phoneClient = $_POST["phoneClient"];
$emailClient = $_POST["emailClient"];

$insertar = "INSERT INTO cliente(tipoDocumento, numeroDocumento, nombreCliente, apellidoCliente, direccionCliente, telefonoCliente, correoCliente)
VALUES ('$typeDocumentClient', '$numberDocumentClient', '$nameClient', '$lastNameClient', '$addressClient', '$phoneClient', '$emailClient')";

$resultado = mysqli_query($conexion, $insertar);

if ($resultado) {
    echo "<script>alert('Se ha registrado el cliente con exito');window.location='../cliente.php'</script>";
} else {
    echo "<script>alert('No se pudo registrar el cliente');</script>";
}
?>

<!-- window.history.go(-1); -->