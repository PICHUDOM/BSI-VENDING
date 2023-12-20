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

$(function(){
    var current = location.pathname;
    $('#sidebar ul li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})
