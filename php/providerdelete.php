<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete provider</title>
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

        // OBTAIN PARAMS FROM URL 
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
        $delete = isset($_REQUEST['delete']) ? $_REQUEST['delete'] : null;


        if ($_SERVER['REQUEST_METHOD']=='GET') {

            if($delete){

                $hostDB = 'localhost:3307';
                $nombreDB = 'newyouhavebd';
                $usuarioDB = 'root';
                $passwordDB = '';
            
                try {

                    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                    $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);

                    $sql = "DELETE FROM proveedor WHERE id=?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute( [$id] );

                    echo "<script>
                    swal({
                        title: 'Proveedor eliminado',
                        text: 'El Proveedor ha sido eliminado con exito.',
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
                        text: 'No hemos podido eliminar el Proveedor',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    }, function() {
                        window.location.href = '../providers.php';
                    });
                </script>";
                }

            }else {
                echo("<script>
                swal({
                    title: 'Eliminar Proveedor',
                    text: '¿Seguro que quieres ELIMINAR este proveedor?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location = './providerdelete.php?id=".$id."&delete=".true."';
                    } else {
                        window.location.href = '../providers.php';
                    }
                });
            </script>");
            }

        }
    ?>
</body>

</html>