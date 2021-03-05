<?php

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $id=isset($_REQUEST['pkIdProveedor']) ? $_REQUEST['pkIdProveedor'] :null;
        $tipoDoc=isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] :null;
        $documento=isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] :null;
        $nombre=isset($_REQUEST['nombreProveedor']) ? $_REQUEST['nombreProveedor'] :null;
        $direccion=isset($_REQUEST['direccionProveedor']) ? $_REQUEST['direccionProveedor'] :null;
        $telefono=isset($_REQUEST['telefonoProveedor']) ? $_REQUEST['telefonoProveedor'] :null;
        $correo=isset($_REQUEST['correoProveedor']) ? $_REQUEST['correoProveedor'] :null;
        $pagina=isset($_REQUEST['paginaWeb']) ? $_REQUEST['paginaWeb'] :null;

        /* variables */
        $hostDB='localhost:3307';
        $nombreDB='newyouhavebd';
        $usuarioDB='root';
        $contraseyaDB='';

        /*Conexion */
        $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
        $miPDO= new PDO($hostPDO, $usuarioDB, $contraseyaDB);

        /*Consulta de insertar */
        $miInsert = $miPDO->prepare('INSERT INTO proveedor (pkIdProveedor, tipoDocumento, numeroDocumento, nombreProveedor, direccionProveedor, telefonoProveedor, correoProveedor, paginaWeb)values( NULL, :tipoDocumento, :numeroDocumento, :nombreProveedor, :direccionProveedor, :telefonoProveedor, :correoProveedor, :paginaWeb)');

        /*Ejecutar insert */
        $miInsert-> execute(
            array(                
                'tipoDocumento'=>$tipoDoc,
                'numeroDocumento'=>$documento,
                'nombreProveedor'=>$nombre,
                'direccionProveedor'=>$direccion,
                'telefonoProveedor'=>$telefono,
                'correoProveedor'=>$correo,
                'paginaWeb'=>$pagina
            )
        );
        if ($miInsert) {
            echo "<script>alert('Se ha registrado el Proveedor con exito');window.location='../providers.php';</script>";
        }
        /*Direcionar a leer */
        //header('Location: providers.php');    
    } else {
        echo "<script>alert('No se pudo registrar el Proveedor');</script>";
    }
    
?>