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

    if ($_SERVER['REQUEST_METHOD']=='POST') {

        $id_cant = isset($_REQUEST['salesproduct']) ? $_REQUEST['salesproduct'] : null;
        $id = explode("_", $id_cant)[0];
        $cantidad = intval(explode("_", $id_cant)[1]);

        $stocksales = isset($_REQUEST['stocksales']) ? $_REQUEST['stocksales'] : null;
        $client = isset($_REQUEST['client']) ? $_REQUEST['client'] : null;
        $date = isset($_REQUEST['fechasalida']) ? $_REQUEST['fechasalida'] : null;

        // echo $id;
        // echo "<br>";
        // echo $cantidad;
        // echo "<br>";
        // echo $client;
        // echo "<br>";
        // echo $date;
        // echo "<br>";
        // echo $stocksales;

        // variables
        $hostDB='localhost:3307';
        $nombreDB='newyouhavebd';
        $usuarioDB='root';
        $passwordDB='';

        if ($cantidad>=$stocksales) {
            
            try {

                $newstock = $cantidad - $stocksales;
                
                $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);

                $update = $pdo -> prepare ('UPDATE product SET cantidad = :cantidad WHERE id = :id');
                $update -> execute ([
                    'id' => $id,
                    'cantidad' => $newstock
                ]);

                $sql = "INSERT INTO sales (producto, stock, cliente, fechasalida) VALUES (?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id, $stocksales, $client, $date]);


                echo "<script>
                swal({
                    title: 'Salida registrada',
                    text: 'El salida del prodcuto ha sido registrado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../sales.php';
                });
               </script>";

            } catch (Exception $e) {
                echo "<script>
                swal({
                    title: 'Error',
                    text: 'No hay suficiente stock',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                }, function() {
                    window.location.href = '../sales.php';
                });
               </script>";   
             }


        } else {
            echo "<script>
            swal({
                title: 'Error',
                text: 'No hay suficiente stock.',
                type: 'error',
                showConfirmButton: false,
                timer: 3000
            }, function () {
                window.location.href = '../sales.php';
            })
        </script>";
        }
        
    }

    ?>

</body>

</html>