<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clients</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dropdown.css">
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

<?php 
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';

    $id=isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
    $tipoDoc=isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] :null;
    $documento=isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] :null;
    $nombre=isset($_REQUEST['nombreProveedor']) ? $_REQUEST['nombreProveedor'] :null;
    $direccion=isset($_REQUEST['direccionProveedor']) ? $_REQUEST['direccionProveedor'] :null;
    $telefono=isset($_REQUEST['telefonoProveedor']) ? $_REQUEST['telefonoProveedor'] :null;
    $correo=isset($_REQUEST['correoProveedor']) ? $_REQUEST['correoProveedor'] :null;
    $pagina=isset($_REQUEST['paginaWeb']) ? $_REQUEST['paginaWeb'] :null;

    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    $miConsulta = $miPDO -> prepare ('SELECT * FROM proveedor WHERE id = :id;');

    // ejecuta consulta
    $miConsulta -> execute(
        [
            'id' => $id
        ]
    );
    // obtiene un resultado
    $libro = $miConsulta -> fetch();


    if ($_SERVER['REQUEST_METHOD']=='POST') {   

        // preparar update
        $miUpdate = $miPDO -> prepare ('UPDATE proveedor SET tipoDocumento = :tipoDocumento, numeroDocumento = :numeroDocumento, nombreProveedor = :nombreProveedor, direccionProveedor = :direccionProveedor, telefonoProveedor = :telefonoProveedor, correoProveedor = :correoProveedor, paginaWeb = :paginaWeb WHERE id = :id');
        
        // Ejecuta UPDATE con los datos
        $miUpdate -> execute(
            [
                'id' =>$id,
                'tipoDocumento'=>$tipoDoc,
                'numeroDocumento'=>$documento,
                'nombreProveedor'=>$nombre,
                'direccionProveedor'=>$direccion,
                'telefonoProveedor'=>$telefono,
                'correoProveedor'=>$correo,
                'paginaWeb'=>$pagina
            ]
        );

        if($miUpdate){
                echo "<script>
                swal({
                    title: 'Proveedor Actualizado',
                    text: 'El Proveedor ha sido actualizado con exito.',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }, function () {
                    window.location.href = '../providers.php';
                });
               </script>";
        }
 
    }

?>

<body>
    <!-- Notifications area -->
    <!-- navLateral -->
    <section class="full-width navLateral">
        <div class="full-width navLateral-bg btn-menu"></div>
        <div class="full-width navLateral-body">
            <div class="full-width navLateral-body-logo text-center tittles">
                <i class="zmdi zmdi-close btn-menu"></i> Inventario - Pinturax
            </div>
            <figure class="full-width navLateral-body-tittle-menu">
                <div>
                    <img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                </div>
                <figcaption>
                    <span>
                    Nombre de Admin<br>
                    <small>Admin</small>
                </span>
                </figcaption>
            </figure>
            <nav class="full-width">
                <ul class="full-width list-unstyle menu-principal">
                    <li class="full-width">
                        <a href="../home.php" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-view-dashboard"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                INICIO
                            </div>
                        </a>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="#!" class="full-width btn-subMenu">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-case"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                ADMINISTRACIÓN
                            </div>
                            <span class="zmdi zmdi-chevron-left"></span>
                        </a>
                        <ul class="full-width menu-principal sub-menu-options">
                            <!-- <li class="full-width">
                                <a href="company.html" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-balance"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        COMPANY
                                    </div>
                                </a>
                            </li> -->
                            <li class="full-width">
                                <a href="../providers.php" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-truck"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        PROVEDORES
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="full-width">
                                <a href="categories.html" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-label"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        CATEGORIES
                                    </div>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="#!" class="full-width btn-subMenu">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-face"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                CUENTAS
                            </div>
                            <span class="zmdi zmdi-chevron-left"></span>
                        </a>
                        <ul class="full-width menu-principal sub-menu-options">
                            <li class="full-width">
                                <a href="../users.php" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        USUARIOS
                                    </div>
                                </a>
                            </li>
                            <li class="full-width">
                                <a href="../client.php" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-accounts"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        CLIENTES
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="../products.php" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-palette"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                PRODUCTOS
                            </div>
                        </a>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="../sales.php" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                SALIDAS
                            </div>
                        </a>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="../inventory.php" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-store"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                INVENTARIO
                            </div>
                        </a>
                    </li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="#!" class="full-width btn-subMenu">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-wrench"></i>
                            </div>
                            <div class="navLateral-body-cr">
                                CONFIGURACIÓN
                            </div>
                            <span class="zmdi zmdi-chevron-left"></span>
                        </a>
                        <ul class="full-width menu-principal sub-menu-options">
                            <li class="full-width">
                                <a href="#!" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-book"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        MANUAL DE USUARIO
                                    </div>
                                </a>
                            </li>
                            <li class="full-width">
                                <a href="#!" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-book"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        MANUAL TECNICO
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- pageContent -->
    <section class="full-width pageContent">
        <!-- navBar -->
        <div class="full-width navBar">
            <div class="full-width navBar-options">
                <i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>
                <div class="mdl-tooltip" for="btn-menu">Mostrar Menu</div>
                <nav class="navBar-options-list">
                    <ul class="list-unstyle">
                        <!-- <li class="btn-Notification" id="notifications">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="mdl-tooltip" for="notifications">Notificaciones</div>
                        </li> -->
                        <li class="btn-exit" id="btn-exit">
                            <i class="zmdi zmdi-power"></i>
                            <div class="mdl-tooltip" for="btn-exit">Salir</div>
                        </li>
                        <li class="text-condensedLight noLink"><small>Nombre de usuario</small></li>
                        <li class="noLink">
                            <figure>
                                <img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                            </figure>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- <section class="full-width header-well">
            <div class="full-width header-well-icon">
                <i class="zmdi zmdi-accounts"></i>
            </div>
            <div class="full-width header-well-text">
                <p class="text-condensedLight">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
                </p>
            </div>
        </section> -->
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabNewProvider" class="mdl-tabs__tab is-active">EDITAR</a>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabNewProvider">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Editar Proveedor
                            </div>
                            <div class="full-width panel-content">
                                <form method='POST'>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS PROVEEDOR</legend><br>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <!-- <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="DNIProvider">
                                                <label class="mdl-textfield__label" for="DNIProvider">DNI</label> -->
                                                <select class="mdl-textfield__input" id="tipoDocumento" name="tipoDocumento" value="<?= $libro['tipoDocumento']?>">
                                                    <option value="" disabled="" selected="">Tipo de documento</option>
                                                    <option value="Tarjeta_Identidad">Tarjeta de identidad</option>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="C_Extranjeria">Cedula de extranjeria</option>
                                                    <option value="NIT">NIT</option>
                                                  </select>
                                                <span class="mdl-textfield__error">Tipo de documento invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9 ]*(\.[0-9]+)?" id="numeroDocumento" name="numeroDocumento" value="<?= $libro['numeroDocumento'] ?>">
                                                <label class="mdl-textfield__label" for="numeroDocumento">Número de documento</label>
                                                <span class="mdl-textfield__error">Número invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombreProveedor" name="nombreProveedor" value="<?= $libro['nombreProveedor'] ?>">
                                                <label class="mdl-textfield__label" for="nombreProveedor">Nombre del Proveedor</label>
                                                <span class="mdl-textfield__error">Nombre invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="direccionProveedor" name="direccionProveedor" value="<?= $libro['direccionProveedor'] ?>">
                                                <label class="mdl-textfield__label" for="direccionProveedor">Dirección</label>
                                                <span class="mdl-textfield__error">Dirección invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="telefonoProveedor" name="telefonoProveedor" value="<?= $libro['telefonoProveedor'] ?>" >
                                                <label class="mdl-textfield__label" for="telefonoProveedor">Telefono</label>
                                                <span class="mdl-textfield__error">Telefono invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="email" id="correoProveedor"name="correoProveedor" value="<?= $libro['correoProveedor'] ?>" >
                                                <label class="mdl-textfield__label" for="correoProveedor">Correo</label>
                                                <span class="mdl-textfield__error">Correo invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="paginaWeb" name="paginaWeb" value="<?= $libro['paginaWeb'] ?>" >
                                                <label class="mdl-textfield__label" for="paginaWeb">Web</label>
                                                <span class="mdl-textfield__error">Pagina web invalida</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <p class="text-center">
                                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProvider">
											<i class="zmdi zmdi-check"></i>
										</button>
                                        <div class="mdl-tooltip" for="btn-addProvider">Editar proveedor</div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>