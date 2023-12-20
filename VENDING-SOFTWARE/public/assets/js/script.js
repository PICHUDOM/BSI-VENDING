/*------------------------------------------------------------------
* Bootstrap Simple Admin Template
* Version: 3.0
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-------------------------------------------------------------------*/
(function () {
    "use strict";
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $("#body").toggleClass("active");

        if ($("#sidebar").hasClass("active")) {
            $("#body").css("margin-left", "0");
            $(".navbar").css("width", "100%");
        } else {
            $("#body").css("margin-left", "250px");
            $(".navbar").css("width", "83%");
        }
    });
})();
