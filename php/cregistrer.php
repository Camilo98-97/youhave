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
    <?php 
    // comprobar recibo de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $tipoDocumento = isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] : null;
        $numeroDocumento = isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] : null;
        $nombreCliente = isset($_REQUEST['nombreCliente']) ? $_REQUEST['nombreCliente'] : null;
        $apellidoCliente = isset($_REQUEST['apellidoCliente']) ? $_REQUEST['apellidoCliente'] : null;
        $direccionCliente = isset($_REQUEST['direccionCliente']) ? $_REQUEST['direccionCliente'] : null;
        $telefonoCliente = isset($_REQUEST['telefonoCliente']) ? $_REQUEST['telefonoCliente'] : null;
        $correoCliente = isset($_REQUEST['correoCliente']) ? $_REQUEST['correoCliente'] : null;

        // variables
        $hostDB = 'localhost:3307';
        $nombreDB = 'newyouhavebd';
        $usuarioDB = 'root';
        $passwordDB = '';

        // cosulta de insertar
        if ($tipoDocumento) {

             try {

                $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);
    
                $sql = "INSERT INTO cliente(tipoDocumento, numeroDocumento, nombreCliente, apellidoCliente, direccionCliente, telefonoCliente, correoCliente) VALUES (?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$tipoDocumento,$numeroDocumento,$nombreCliente,$apellidoCliente,$direccionCliente,$telefonoCliente,$correoCliente]);

                echo "<script>
                swal({
                    title: 'Cliente registrado',
                    text: 'El cliente ha sido registrado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../client.php';
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
                    window.location.href = '../client.php';
                });
               </script>";   
             }


    } else {
        echo "<script>
        swal({
            title: 'Error',
            text: 'No hemos podido registrar el cliente.',
            type: 'error',
            showConfirmButton: false,
            timer: 1500
        }, function () {
            window.location.href = '../client.php';
        })
       </script>";
    }
}
?>
</body>

</html>