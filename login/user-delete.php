<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert product</title>
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
    $id=isset($_REQUEST['id']) ? $_REQUEST['id']: null;
    $deleted = isset($_REQUEST['deleted']) ? $_REQUEST['deleted'] : null;


    if ($_SERVER['REQUEST_METHOD']=='GET') {

        if($deleted){

            $hostDB = 'localhost:3307';
            $nombreDB = 'newyouhavebd';
            $usuarioDB = 'root';
            $passwordDB = '';
        
            try {

                $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);

                $sql = "DELETE FROM users WHERE id=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute( [$id] );

                echo "<script>
                swal({
                    title: 'Usuario eliminado',
                    text: 'El usuario ha sido eliminado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../users.php';
                });
            </script>";


            }catch (Exception $e) {
                echo "<script>
                swal({
                    title: 'Error',
                    text: 'No hemos podido eliminar el usuasrio',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500
                }, function() {
                    window.location.href = '../users.php';
                });
            </script>";
            }

        }else {
            echo("<script>
            swal({
                title: 'Eliminar cliente',
                text: '¿Seguro que quieres ELIMINAR este ususario?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si',
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = './user-delete.php?id=".$id."&deleted=".true."';
                } else {
                    window.location.href = '../users.php';
                }
            });
        </script>");
        }

    }
    ?>
</body>

</html>