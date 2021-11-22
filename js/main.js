$(document).ready(function() {
    /*Mostrar ocultar area de notificaciones*/
    $('.btn-Notification').on('click', function() {
        var ContainerNoty = $('.container-notifications');
        var NotificationArea = $('.NotificationArea');
        if (NotificationArea.hasClass('NotificationArea-show') && ContainerNoty.hasClass('container-notifications-show')) {
            NotificationArea.removeClass('NotificationArea-show');
            ContainerNoty.removeClass('container-notifications-show');
        } else {
            NotificationArea.addClass('NotificationArea-show');
            ContainerNoty.addClass('container-notifications-show');
        }
    });
    /*Mostrar ocultar menu principal*/
    $('.btn-menu').on('click', function() {
        var navLateral = $('.navLateral');
        var pageContent = $('.pageContent');
        var navOption = $('.navBar-options');
        if (navLateral.hasClass('navLateral-change') && pageContent.hasClass('pageContent-change')) {
            navLateral.removeClass('navLateral-change');
            pageContent.removeClass('pageContent-change');
            navOption.removeClass('navBar-options-change');
        } else {
            navLateral.addClass('navLateral-change');
            pageContent.addClass('pageContent-change');
            navOption.addClass('navBar-options-change');
        }
    });
    /*Salir del sistema*/
    $('.btn-exit').on('click', function() {
        swal({
                title: '¿Quieres salir del sistema?',
                text: "La sesión actual se cerrará y saldrá del sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si',
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = './index.php';
                }
            });
    });

    /*eliminar producto*/
    
    $('.btn-delete-product').on('click', function() {
        swal({
            title: '¿Quieres Eliminar este producto?',
            text: "El producto se eliminara",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            closeOnConfirm: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = '../products/product-delete.php';
            }
        });
    });

    // $('.btn-update-product').on('click', function() {
    //     swal({
    //         title: 'Producto Actualizado',
    //         text: 'El producto ha sido actualziado con exito.',
    //         type: 'success',
    //         showConfirmButton: false,
    //         timer: 1500
    //     }, function () {
    //         window.location.href = '../products.php';
    //     });
    // });



    /*Mostrar y ocultar submenus*/
    $('.btn-subMenu').on('click', function() {
        var subMenu = $(this).next('ul');
        var icon = $(this).children("span");
        if (subMenu.hasClass('sub-menu-options-show')) {
            subMenu.removeClass('sub-menu-options-show');
            icon.addClass('zmdi-chevron-left').removeClass('zmdi-chevron-down');
        } else {
            subMenu.addClass('sub-menu-options-show');
            icon.addClass('zmdi-chevron-down').removeClass('zmdi-chevron-left');
        }
    });
});
(function($) {
    $(window).on("load", function() {
        $(".NotificationArea, .pageContent").mCustomScrollbar({
            theme: "dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true }
        });
        $(".navLateral-body").mCustomScrollbar({
            theme: "light-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true }
        });
    });
})(jQuery);