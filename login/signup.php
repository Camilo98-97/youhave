<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username=isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
    $password=isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // variables
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';

    // conexion
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    // cosulta de insertar
    $miINSERT = $miPDO -> prepare('INSERT INTO users(username, password)
    VALUES (:username, :password)');

    // ejecutar insert
    $miINSERT->execute(
    array (
        'username'=>$username,
        'password'=>$hashed_password
        )
    );
    if ($miINSERT) {
        echo "<script>alert('Se ha registrado el Usuario con exito');window.location='../users.php';</script>";
    }
    // // Redireccionar a leer
    // header ('Location: client.php');
} else {
    echo "<script>alert('No se pudo registrar el Usuario');</script>";
}
?>

