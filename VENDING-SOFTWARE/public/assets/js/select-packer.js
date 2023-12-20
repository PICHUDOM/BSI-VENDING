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
$(document).ready(function () {
    $("#provinc").change(function () {
        if ($(this).val() !== "") {
            $("#distric").prop("disabled", false);
        } else {
            $("#distric").prop("disabled", true);
        }
    });
    $("#distric").change(function () {
        if ($(this).val() !== "") {
            $("#communes").prop("disabled", false);
        } else {
            // If no option is selected in the first dropdown, disable the second dropdown
            $("#communes").prop("disabled", true);
        }
    });
    $("#communes").change(function () {
        if ($(this).val() !== "") {
            $("#villege").prop("disabled", false);
        } else {
            // If no option is selected in the first dropdown, disable the second dropdown
            $("#villege").prop("disabled", true);
        }
    });

    $("#provinc").change(function () {
        var provinceId = $(this).val();
        console.log("province ID:", provinceId);
    });
});
