<?php 
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';

    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    // Consulta 
    $id=isset($_REQUEST['id']) ? $_REQUEST['id']: null;

    // Eliminiar
    $miConsulta=$miPDO -> prepare('DELETE FROM users WHERE id=:id');

    // Ejecucion
    $miConsulta->execute([
        'id'=>$id
    ]);

    // Redireccionamiento
    header('Location: ../users.php');
?>