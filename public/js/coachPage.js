$(document).ready(function () {
    $(".sidebar-dropdown > a").click(function () {
        if (!$(this).parent().hasClass("active")) {

            $(".sidebar-submenu").slideUp(200);
            $(".sidebar-dropdown").removeClass("active");

            /*  fadi and gaith
            $(".sidebar-dropdown").addClass("active");

            $(this).parent().removeClass("active");*/
        } else {
            $(".sidebar-dropdown").addClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);


            /*    fadi and gaith
            $(".sidebar-dropdown").addClass("active");
             $(this)
                 .next(".sidebar-submenu")
                 .slideDown(200);
             $(this)
                 .parent()
                 .addClass("active");*/
        }
    });

    $("#close-sidebar").click(function () {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function () {
        $(".page-wrapper").addClass("toggled");
    });

});
