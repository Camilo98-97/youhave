<?php
    // variables
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';
    $idCliente=isset($_REQUEST['idCliente']) ? $_REQUEST['idCliente'] : null;
    $tipoDocumento=isset($_REQUEST['tipoDocumento']) ? $_REQUEST['tipoDocumento'] : null;
    $numeroDocumento=isset($_REQUEST['numeroDocumento']) ? $_REQUEST['numeroDocumento'] : null;
    $nombreCliente=isset($_REQUEST['nombreCliente']) ? $_REQUEST['nombreCliente'] : null;
    $apellidoCliente=isset($_REQUEST['apellidoCliente']) ? $_REQUEST['apellidoCliente'] : null;
    $direccionCliente=isset($_REQUEST['direccionCliente']) ? $_REQUEST['direccionCliente'] : null;
    $telefonoCliente=isset($_REQUEST['telefonoCliente']) ? $_REQUEST['telefonoCliente'] : null;
    $correoCliente=isset($_REQUEST['correoCliente']) ? $_REQUEST['correoCliente'] : null;

    // conecta con DB
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    // comprobar se recibimos datos por POST
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        // preparar update
        $miUpdate = $miPDO -> prepare ('UPDATE cliente SET tipoDocumento = :tipoDocumento, numeroDocumento = :numeroDocumento, nombreCliente = :nombreCliente, apellidoCliente = :apellidoCliente, direccionCliente = :direccionCliente, telefonoCliente = :telefonoCliente, correoCliente = :correoCliente WHERE idCliente = :idCliente');
        
        // Ejecuta UPDATE con los datos
        $miUpdate -> execute(
            [
                'idCliente' => $idCliente,
                'tipoDocumento' => $tipoDocumento,
                'numeroDocumento' => $numeroDocumento,
                'nombreCliente' => $nombreCliente,
                'apellidoCliente' => $apellidoCliente,
                'direccionCliente' => $direccionCliente,
                'telefonoCliente' => $telefonoCliente,
                'correoCliente' => $correoCliente
            ]
        );

        // redireccionar a leer
        header('Location: ../client.php'); 

    } else {
        // prepara select
        $miConsulta = $miPDO -> prepare ('SELECT * FROM cliente WHERE idCliente = :idCliente;');

        // ejecuta consulta
        $miConsulta -> execute(
            [
                'idCliente' => $idCliente
            ]
        );

    }

    // obtiene un resultado
    $libro = $miConsulta -> fetch();

?>

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
        window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../js/material.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="icon" href="../assets/img/icon.png">
</head>

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
                                ADMINISTRACI??N
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
                                CONFIGURACI??N
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
                <a href="#tabNewClient" class="mdl-tabs__tab is-active">EDITAR</a>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabNewClient">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Editar cliente
                            </div>
                            <div class="full-width panel-content">
                                <form method="post">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS DEL CLIENTE</legend><br>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <!-- <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="DNIClient">
                                                <label class="mdl-textfield__label" for="DNIClient">DNI</label> -->
                                                <select class="mdl-textfield__input" id="tipoDocumento" name="tipoDocumento" value="<?= $libro['tipoDocumento'] ?>">
                                                    <option value="" disabled="" selected="">Tipo de documento</option>
                                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                                                    <option value="NIT">NIT</option>
                                                  </select>
                                                <span class="mdl-textfield__error">Tipo de documento invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="numeroDocumento" name="numeroDocumento" value="<?= $libro['numeroDocumento'] ?>">
                                                <label class="mdl-textfield__label">N??mero de documento</label>
                                                <span class="mdl-textfield__error">N??mero Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z???????????????????? ]*(\.[0-9]+)?" id="nombreCliente" name="nombreCliente" value="<?= $libro['nombreCliente'] ?>">
                                                <label class="mdl-textfield__label">Nombre</label>
                                                <span class="mdl-textfield__error">Nombre Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z???????????????????? ]*(\.[0-9]+)?" id="apellidoCliente" name="apellidoCliente" value="<?= $libro['apellidoCliente'] ?>">
                                                <label class="mdl-textfield__label">Apellido</label>
                                                <span class="mdl-textfield__error">Apellido Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="direccionCliente" name="direccionCliente" value="<?= $libro['direccionCliente'] ?>">
                                                <label class="mdl-textfield__label">Direcci??n</label>
                                                <span class="mdl-textfield__error">Direcci??n Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="telefonoCliente" name="telefonoCliente" value="<?= $libro['telefonoCliente'] ?>"> 
                                                <label class="mdl-textfield__label">Telefono</label>
                                                <span class="mdl-textfield__error">Telefono Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="email" id="correoCliente" name="correoCliente" value="<?= $libro['correoCliente'] ?>">
                                                <label class="mdl-textfield__label">Correo</label>
                                                <span class="mdl-textfield__error">Correo Invalido</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <input type="hidden" name="idCliente" value="<?= $libro['idCliente'] ?>">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary">
											<i class="zmdi zmdi-check"></i>
										</button>
                                        <div class="mdl-tooltip" for="btn-addClient">Editar Cliente</div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>