<?php
    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];

    $conexion=mysqli_connect("localhost:3307","root","","newyouhavebd");

    $consulta="SELECT * FROM registrocuentas WHERE usuario='$usuario' AND pass='$pass'";
    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($resultado);

    if ($filas>0) {
        header("location:../home.php");
    } else {
        echo "<script>alert('Error al ingresar');window.location='../index.php';</script>";
        // echo ($usuario);
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>