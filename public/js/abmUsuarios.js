$(function(){
	$("#menuUsuarios").addClass("active");
	$("#menuUsuarios").css("background-color", "#35A1C0");
	$("#mySidenav").css("width","15%");
	$(".navbar-fixed-top").css("margin-left","15%");
});

function divLogin(id){
	var mostrar = $(id).is(':visible');
	if(mostrar)
		$(id).hide();
	else
		$(id).show();
}

function enviar_url(){
	var url = $("#url_permiso").val();
	var metodo = $("#metodo").val();
	$.ajax({
		type: "post",
		data: {url_permiso: url, metodo:metodo,'_token':$('meta[name="csrf-token"]').attr('content')},
	    url: 'usuarios/alta/url',
	}).success(function(data){
		$("#eliminar_alert_success").show();
		$("#id_msg_success").text(data.message);
		setTimeout(function() {
	        $("#eliminar_alert_success").fadeOut(3000);
		},1500);
	}).error(function(jqXHR){
		if(jqXHR.status == 403){
			var $result = $(jqXHR.responseText);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
		}else{
			var mensaje = jqXHR.responseJSON;
			$("#eliminar_alert_error").show();
			$("#id_msg_error").text(mensaje.message);
			setTimeout(function() {
		        $("#eliminar_alert_error").fadeOut(3000);
			},1500);
		}
	});
}

function asignar_permisos_url(id){
	var url = $('#url_'+id).val()
	var metodo = $('#metodo_'+id).val();
	var admin = $('#role_admin_'+id+':checked').val();
	var nivel_1 = $('#role_nivel_1_'+id+':checked').val();
	var nivel_2 = $('#role_nivel_2_'+id+':checked').val();
	$.ajax({
		type: "post",
		data: {
			url_permiso: url, 
			metodo:metodo,
			admin: admin,
			nivel_1: nivel_1,
			nivel_2: nivel_2,
			'_token':$('meta[name="csrf-token"]').attr('content')
		},
	    url: 'usuarios/listado/url',
	}).success(function(data){
		$("#eliminar_alert_success").show();
		$("#id_msg_success").text(data.message);
		setTimeout(function() {
	        $("#eliminar_alert_success").fadeOut(3000);
		},2000);
	}).error(function(jqXHR){
		if(jqXHR.status == 403){
			var $result = $(jqXHR.responseText);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
		}else{
			var mensaje = jqXHR.responseJSON;
			$("#eliminar_alert_error").show();
			$("#id_msg_error").text(mensaje.message);
			setTimeout(function() {
		        $("#eliminar_alert_error").fadeOut(3000);
			},2000);
		}
	});
}

function asignar_permisos_user(id){
	var email = $('#email_'+id).val();
	var admin = $('#role_admin_'+id+':checked').val();
	var nivel_1 = $('#role_nivel_1_'+id+':checked').val();
	var nivel_2 = $('#role_nivel_2_'+id+':checked').val();
	$.ajax({
		type: "post",
		data: {
			email: email,
			admin: admin,
			nivel_1: nivel_1,
			nivel_2: nivel_2,
			'_token':$('meta[name="csrf-token"]').attr('content'),
		},
	    url: 'usuarios/listado',
	}).success(function(data){
		$("#eliminar_alert_success").show();
		$("#id_msg_success").text(data.message + data.user.toUpperCase());
		setTimeout(function() {
	        $("#eliminar_alert_success").fadeOut(3000);
		},2000);
	}).error(function(data){
		var mensaje = $.parseJSON(data.responseText);
		$("#eliminar_alert_error").show();
		$("#id_msg_error").text(mensaje.message + mensaje.user.toUpperCase());
		setTimeout(function() {
	        $("#eliminar_alert_error").fadeOut(3000);
		},2000);
	});
}