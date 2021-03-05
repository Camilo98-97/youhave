<?php 
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';

    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    // Consulta cliente
    $idCliente=isset($_REQUEST['idCliente']) ? $_REQUEST['idCliente']: null;

    // Eliminiar
    $miConsulta=$miPDO -> prepare('DELETE FROM cliente WHERE idCliente=:idCliente');

    // Ejecucion
    $miConsulta->execute([
        idCliente=>$idCliente
    ]);

    // Redireccionamiento
    header('Location: ../client.php');
?>