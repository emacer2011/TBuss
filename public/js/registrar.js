$(function () {
    $('#fecha').datetimepicker({
    	format: 'DD/MM/YYYY',
    	locale: 'es'
    });
    $('#hora').datetimepicker({
    	format: 'HH:mm',
    	locale: 'es'
    });
    $("#menuRegistrar").addClass("active");
    $("#menuRegistrar").css("background-color", "#35A1C0");
});