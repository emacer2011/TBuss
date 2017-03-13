var hora = ("0" + new Date().getHours()).slice(-2);
var min = ("0" + new Date().getMinutes()).slice(-2);
// var seg = ("0" + new Date().getSeconds()).slice(-2);
// var hora = "10";
// var min = "34";
var seg = "00";
var intervalo;
$(function() {
	intervalo = setInterval(actualizar_reloj, 1000);
	cambiar_fecha();
});

function actualizar_reloj() {
	// if (seg == 59) {
	if (seg == 5) {
		seg = "00";
		inc_min();
	}else{
		seg++;
		seg = ("0"+seg).slice(-2);
	}

	$("#hora").empty();
	$("#hora").append(hora+":"+min+":"+seg);
}

function inc_hora() {
	if (hora == 23) {
		hora = "00";
		cambiar_fecha();
	}else{
		hora++;
		hora = ("0"+hora).slice(-2);
	}
}

function cambiar_fecha() {
	var fecha = new Date();
	$("#fecha").text(fecha.toLocaleDateString());
}

function inc_min() {
	if (min == 59) {
		min = "00";
		inc_hora();
	}else{
		min++;
		min = ("0"+min).slice(-2);
	}
	actualizar_viajes();
}