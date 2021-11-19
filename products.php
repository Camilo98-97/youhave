<?php
    $hostDB='localhost:3307';
    $nombreDB='newyouhavebd';
    $usuarioDB='root';
    $passwordDB='';

    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO=new PDO($hostPDO, $usuarioDB, $passwordDB);

    $miConsulta=$miPDO->prepare('SELECT * FROM product');
    $miConsulta->execute();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/ajaxjq.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/material.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="icon" href="assets/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
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
                    <img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
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
                        <a href="home.php" class="full-width">
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
                                <a href="providers.php" class="full-width">
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
                            <!-- <li class="full-width">
                                <a href="admin.html" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        ADMINISTRADORES
                                    </div>
                                </a>
                            </li> -->
                            <li class="full-width">
                                <a href="users.php" class="full-width">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <div class="navLateral-body-cr">
                                        USUARIOS
                                    </div>
                                </a>
                            </li>
                            <li class="full-width">
                                <a href="client.php" class="full-width">
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
                        <a href="products.php" class="full-width">
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
                        <a href="sales.php" class="full-width">
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
                        <a href="inventory.php" class="full-width">
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
                                <img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                            </figure>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- <section class="full-width header-well">
            <div class="full-width header-well-icon">
                <i class="zmdi zmdi-washing-machine"></i>
            </div>
            <div class="full-width header-well-text">
                <p class="text-condensedLight">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
                </p>
            </div>
        </section> -->
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#tabListProducts" class="mdl-tabs__tab is-active">LISTA</a>
                <a href="#tabNewProduct" class="mdl-tabs__tab">NUEVO</a>
            </div>
            <div class="mdl-tabs__panel" id="tabNewProduct">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primary text-center tittles">
                                Nuevo Producto
                            </div>
                            <div class="full-width panel-content">
                                <form action="products/registrer.php" method="POST">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
                                                &nbsp; INFORMACIÓN BASICA</legend><br>
                                        </div>
                                        <!-- <div class="mdl-cell mdl-cell--12-col">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode">
                                                <label class="mdl-textfield__label" for="BarCode">Codigo de barras</label>
                                                <span class="mdl-textfield__error">Codigo de barras invalido</span>
                                            </div>
                                        </div> -->
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"
                                                    pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="nombre">
                                                <label class="mdl-textfield__label" for="nameProduct">Nombre</label>
                                                <span class="mdl-textfield__error">Nombre invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" name="tipo">
                                                <label class="mdl-textfield__label" for="typeProduct">Tipo de
                                                    producto</label>
                                                <span class="mdl-textfield__error">Tipo de producto Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="number"
                                                    pattern="-?[0-9]*(\.[0-9]+)?" name="cantidad">
                                                <label class="mdl-textfield__label" for="stsockProduct">Unidades</label>
                                                <span class="mdl-textfield__error">Nombre invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"
                                                    pattern="-?[0-9.]*(\.[0-9]+)?" name="precio">
                                                <label class="mdl-textfield__label" for="priceProduct">Precio</label>
                                                <span class="mdl-textfield__error">Precio Invalido</span>
                                            </div>
                                        </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" name="color">
                                                <label class="mdl-textfield__label" for="colorProduct">Color</label>
                                                <span class="mdl-textfield__error">Color Invalido</span>
                                            </div>
                                        </div>
                                        <!-- <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; CATEGORY</legend><br>
                                        </div>
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
													<option value="" disabled="" selected="">Select category</option>
													<option value="">Category 1</option>
													<option value="">Category 2</option>
												</select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="mdl-cell mdl-cell--12-col">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input" id="idproveedor">
													<option value="" disabled="" selected="">Selecciona Proveedor</option>
													<option value="">Provider 1</option>
													<option value="">Provider 2</option>
												</select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="modelProduct">
                                                <label class="mdl-textfield__label" for="modelProduct">Modelo</label>
                                                <span class="mdl-textfield__error">Modelo Invalido</span>
                                            </div>
                                        </div> -->
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text" id="markProduct"
                                                    name="marca">
                                                <label class="mdl-textfield__label" for="markProduct">Marca</label>
                                                <span class="mdl-textfield__error">Marca Invalido</span>
                                            </div>
                                        </div>

                                        <!-- <div class="mdl-cell mdl-cell--12-col">
                                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; OTHER DATA</legend><br>
                                        </div> -->
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input type="date" class="mdl-textfield__input" name="fechaIngreso">
                                            </div>
                                        </div>
                                        <!-- <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <select class="mdl-textfield__input">
													<option value="" disabled="" selected="">Selecciona el estado</option>
													<option value="">Activo</option>
													<option value="">Desactivo</option>
												</select>
                                            </div>
                                        </div> -->
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <button
                                            class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                                            id="btn-addProduct">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    <div class="mdl-tooltip" for="btn-addProduct">Agregar Producto</div>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-tabs__panel is-active" id="tabListProducts">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                        <!-- <form action="#">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                <label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
                                <div class="mdl-textfield__expandable-holder">
                                    <input class="mdl-textfield__input" type="text" id="searchProduct">
                                    <label class="mdl-textfield__label"></label>
                                </div>
                            </div>
                        </form>
                        <nav class="full-width menu-categories">
                            <ul class="list-unstyle text-center">
                                <li><a href="#!">Category 1</a></li>
                                <li><a href="#!">Category 2</a></li>
                                <li><a href="#!">Category 3</a></li>
                                <li><a href="#!">Category 4</a></li>
                            </ul>
                        </nav> -->
                        <div class="full-width text-center" style="padding: 30px 0;">

                            <?php foreach ($miConsulta as $clave=>$valor):?>

                            <div class="mdl-card mdl-shadow--2dp full-width product-card">

                                <div class="mdl-card__title">
                                    <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
                                </div>

                                <div class="mdl-card__supporting-text">
                                    <small>Cantidad: <?=$valor['cantidad']?></small><br>
                                    <small>Marca: <?=$valor['marca']?></small><br>
                                    <small>Fecha ingreso: <?=$valor['fechaIngreso']?></small>
                                </div>

                                <div class="mdl-card__actions mdl-card--border">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>
                                            <?=$valor['nombre']?>
                                        </div>

                                        <div class="btn-group dropup">

                                            <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Opciones</span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <!-- Dropdown menu links -->
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="products/product-delete.php?id=<?=$valor['id']?>">Eliminar</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item"
                                                        href="products/render-page-edit.php?id=<?=$valor['id']?>">Editar</a>
                                                </li>


                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <?php endforeach;?>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>