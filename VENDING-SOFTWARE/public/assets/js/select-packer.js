$(document).ready(function () {
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container =
        $(".bootstrap-iso form").length > 0
            ? $(".bootstrap-iso form").parent()
            : "body";
    date_input.datepicker({
        format: "mm/dd/yyyy",
        container: container,
        todayHighlight: true,
        autoclose: true,
    });
});
//selectwo

$(function () {
    var current = location.pathname;
    $("#sidebar ul li a").each(function () {
        var $this = $(this);
        // if the current path is like this link, make it active
        if ($this.attr("href").indexOf(current) !== -1) {
            $this.addClass("active");
        }
    });
});
$(document).ready(function () {

    $("#uielementsmenu").on("show.bs.collapse", function () {
        $(".fa-angle-right")
            .removeClass("fa-angle-right")
            .addClass("fa-chevron-down");
    });

    $("#uielementsmenu").on("hide.bs.collapse", function () {
        $(".fa-chevron-down")
            .removeClass("fa-chevron-down")
            .addClass("fa-angle-right");
    });
    $("#pro").on("show.bs.collapse", function () {
        $(".fa-angle-right")
            .removeClass("fa-angle-right")
            .addClass("fa-chevron-down");
    });

    $("#pro").on("hide.bs.collapse", function () {
        $(".fa-chevron-down")
            .removeClass("fa-chevron-down")
            .addClass("fa-angle-right");
    });

    $("#inco").on("show.bs.collapse", function () {
        $(".fa-angle-right")
            .removeClass("fa-angle-right")
            .addClass("fa-chevron-down");
    });

    $("#inco").on("hide.bs.collapse", function () {
        $(".fa-chevron-down")
            .removeClass("fa-chevron-down")
            .addClass("fa-angle-right");
    });
});
// $(document).ready(function () {
//     $("#provinc").change(function () {
//         if ($(this).val() !== "") {
//             $("#distric").prop("disabled", false);
//         } else {
//             $("#distric").prop("disabled", true);
//         }
//     });
//     $("#distric").change(function () {
//         if ($(this).val() !== "") {
//             $("#communes").prop("disabled", false);
//         } else {
//             // If no option is selected in the first dropdown, disable the second dropdown
//             $("#communes").prop("disabled", true);
//         }
//     });
//     $("#communes").change(function () {
//         if ($(this).val() !== "") {
//             $("#villege").prop("disabled", false);
//         } else {
//             // If no option is selected in the first dropdown, disable the second dropdown
//             $("#villege").prop("disabled", true);
//         }
//     });

//     $("#provinc").change(function () {
//         var provinceId = $(this).val();
//         console.log("province ID:", provinceId);
//     });
// });
