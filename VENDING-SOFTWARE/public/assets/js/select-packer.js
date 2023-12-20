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
$("#provinc").change(function () {
    var provinceId = $(this).val();

    // Enable the district select box
    $("#distric").prop("disabled", false);

    // Clear existing options
    $("#distric").html('<option value="" disabled selected>Districts</option>');

    // Render district options based on the selected province
    if (provinceId == 12) {
        // Render districts for province ID 12
        console.log("hhhhh");
    } else if (provinceId == 1) {
        console.log("tttt");
    } else {
        // Disable the district select box if no province is selected
        $("#distric").prop("disabled", true);
    }
});
