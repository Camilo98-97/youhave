<?php 
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $contraseyaDB='';

    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $contraseyaDB);

    // Consulta cliente
    $idProvider=isset($_REQUEST['pkIdProveedor']) ? $_REQUEST['pkIdProveedor']: null;

    // Eliminiar
    $miConsulta=$miPDO -> prepare('DELETE FROM proveedor WHERE pkIdProveedor=:pkIdProveedor');

    // Ejecucion
    $miConsulta->execute([
        pkIdProveedor=>$idProvider
    ]);

    // Redireccionamiento
    header('Location: ../providers.php');
?>