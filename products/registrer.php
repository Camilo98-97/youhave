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
    // comprobar recibo de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $nombre=isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
        $tipo=isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : null;
        $cantidad=isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : null;
        $precio=isset($_REQUEST['precio']) ? $_REQUEST['precio'] : null;
        $color=isset($_REQUEST['color']) ? $_REQUEST['color'] : null;
        $marca=isset($_REQUEST['marca']) ? $_REQUEST['marca'] : null;
        $fechaIngreso=isset($_REQUEST['fechaIngreso']) ? $_REQUEST['fechaIngreso'] : null;
        $image=isset($_REQUEST['image']) ? $_REQUEST['image'] : null;

        // variables
        $hostDB='localhost:3307';
        $nombreDB='newyouhavebd';
        $usuarioDB='root';
        $passwordDB='';

        // conexion

        // cosulta de insertar
        if ($nombre) {

             try {

                $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
                $pdo = new PDO($hostPDO, $usuarioDB, $passwordDB);
    
                $sql = "INSERT INTO product(nombre, tipo, cantidad, precio, color, marca, fechaIngreso, image) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nombre,$tipo,$cantidad,$precio,$color,$marca,$fechaIngreso,NULL]);

                echo "<script>
                swal({
                    title: 'Producto registrado',
                    text: 'El producto ha sido registrado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../products.php';
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
                    window.location.href = '../products.php';
                });
               </script>";   
             }


    } else {
        echo "<script>
        swal({
            title: 'Error',
            text: 'No hemos podido registrar el producto.',
            type: 'error',
            showConfirmButton: false,
            timer: 1500
        }, function () {
            window.location.href = '../products.php';
        })
       </script>";
    }
}
?>

</body>

</html>