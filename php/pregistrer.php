<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert client</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/ajaxjq.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../js/material.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="icon" href="../assets/img/icon.png">
</head>

<body>

</body>
<?php 
    // comprobar recibo de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tipoDoc=isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] :null;
        $documento=isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] :null;
        $nombre=isset($_REQUEST['nombreProveedor']) ? $_REQUEST['nombreProveedor'] :null;
        $direccion=isset($_REQUEST['direccionProveedor']) ? $_REQUEST['direccionProveedor'] :null;
        $telefono=isset($_REQUEST['telefonoProveedor']) ? $_REQUEST['telefonoProveedor'] :null;
        $correo=isset($_REQUEST['correoProveedor']) ? $_REQUEST['correoProveedor'] :null;
        $pagina=isset($_REQUEST['paginaWeb']) ? $_REQUEST['paginaWeb'] :null;

        // variables
        $hostDB = 'localhost:3307';
        $nombreDB = 'newyouhavebd';
        $usuarioDB = 'root';
        $passwordDB = '';

        // cosulta de insertar
        if ($tipoDoc) {

             try {

                $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);
    
                $sql = "INSERT INTO proveedor (tipoDocumento, numeroDocumento, nombreProveedor, direccionProveedor, telefonoProveedor, correoProveedor, paginaWeb)values(?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$tipoDoc,$documento,$nombre,$direccion,$telefono,$correo,$pagina]);

                echo "<script>
                swal({
                    title: 'Proveedor registrado',
                    text: 'El Proveedor ha sido registrado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../providers.php';
                });
               </script>";

             }catch (Exception $e) {
                echo "<script>
                swal({
                    title: 'Error',
                    text: 'Existen campos vacios',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500
                }, function() {
                    window.location.href = '../providers.php';
                });
               </script>";   
             }


    } else {
        echo "<script>
        swal({
            title: 'Error',
            text: 'No hemos podido registrar el Proveedor.',
            type: 'error',
            showConfirmButton: false,
            timer: 1500
        }, function () {
            window.location.href = '../providers.php';
        })
       </script>";
    }
}
?>

</html>