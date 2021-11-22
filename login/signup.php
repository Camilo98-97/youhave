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
                echo "<script>
                swal({
                    title: 'Usuario registrado',
                    text: 'El usuario ha sido registrado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../users.php';
                });
               </script>";
            }
            // // Redireccionar a leer
            // header ('Location: client.php');
        } else {
            echo "<script>
            swal({
            title: 'Error',
            text: 'No hemos podido registrar el usuario.',
            type: 'error',
            showConfirmButton: false,
            timer: 1500
            }, function () {
            window.location.href = '../users.php';
            })
            </script>";
        }

    ?>
</body>

</html>