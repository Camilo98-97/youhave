<?php 
    echo ('antes del if');
    // comprobar recibo de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tipoDocumento=isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] : null;
        $numeroDocumento=isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] : null;
        $nombreCliente=isset($_REQUEST['nombreCliente']) ? $_REQUEST['nombreCliente'] : null;
        $apellidoCliente=isset($_REQUEST['apellidoCliente']) ? $_REQUEST['apellidoCliente'] : null;
        $direccionCliente=isset($_REQUEST['direccionCliente']) ? $_REQUEST['direccionCliente'] : null;
        $telefonoCliente=isset($_REQUEST['telefonoCliente']) ? $_REQUEST['telefonoCliente'] : null;
        $correoCliente=isset($_REQUEST['correoCliente']) ? $_REQUEST['correoCliente'] : null;

        // variables
        $hostDB='localhost:3307';
        $nombreDB='newyouhavebd';
        $usuarioDB='root';
        $passwordDB='';

        // conexion
        $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
        $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

        // cosulta de insertar
        $miINSERT = $miPDO -> prepare('INSERT INTO cliente(tipoDocumento, numeroDocumento, nombreCliente, apellidoCliente, direccionCliente, telefonoCliente, correoCliente)
        VALUES (:tipoDocumento,:numeroDocumento,:nombreCliente, :apellidoCliente, :direccionCliente, :telefonoCliente, :correoCliente)');

        // ejecutar insert
        $miINSERT->execute(
        array (
            'tipoDocumento'=>$tipoDocumento,
            'numeroDocumento'=>$numeroDocumento,
            'nombreCliente'=>$nombreCliente,
            'apellidoCliente'=>$apellidoCliente,
            'direccionCliente'=>$direccionCliente,
            'telefonoCliente'=>$telefonoCliente,
            'correoCliente'=>$correoCliente
            )
        );
        if ($miINSERT) {
            echo "<script>alert('Se ha registrado el cliente con exito');window.location='../client.php';</script>";
        }
        // // Redireccionar a leer
        // header ('Location: client.php');
    } else {
        echo "<script>alert('No se pudo registrar el cliente');</script>";
    }
?>