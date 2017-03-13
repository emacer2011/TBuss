function actualizar_viajes() {
	var template = "<tr class='${clase}'><td>${empresa}</td><td>${coche}</td>"+
					"<td>${origen}</td><td>${destino}</td><td>${fecha}</td>"+
					"<td>${hora}</td><td>${demora}</td><td>PLATAFORMA</td><td>${arribo}</td></tr>";
	$.ajax({
	   	url: 'registros/ajax',
	   	type: 'GET',
	   	error: function() {
      		console.log("error en llamada ajax");
	   	},
	   	success: function(data) {
	   		var danger = [];
	   		var warning = [];
	   		$("#tviajes").children().remove();
	   		for (i = 0; i < data.length; i++) { 
                var id = data[i].id;
                var empresa = data[i].empresa.toUpperCase();
                var origen = data[i].origen.toUpperCase();
                var destino = data[i].destino.toUpperCase();
                var fecha = data[i].fecha;
                var hora = data[i].hora;
                var demora = data[i].demora;
                var coche = data[i].coche;
                var arribo = (data[i].arribo == 1)?"LLEGA":"SALE";
                var minutos = diferencia_minutos(fecha,hora) + Number(demora);
                var clase = "td"+id;
                
                if (minutos > 10)
                	clase = clase + " success";
                else if (minutos == 10)
                	warning.push(id);
                else if (minutos > 5 && minutos < 10)
                	clase = clase + " warning";
                else if (minutos == 5)
                	danger.push(id);
                else if (minutos < 5 && minutos > -1)
                	clase = clase + " danger";
                else{
            		// descartar_viaje(id, minutos);
            		continue;
                }

                if (demora == 0)
                	demora = "SIN DEMORA";
                else
                	demora = demora + " MIN";

                var markup = template.replace(/\$\{empresa\}/i, empresa);
                markup = markup.replace(/\$\{coche\}/i, coche);
                markup = markup.replace(/\$\{origen\}/i, origen);
                markup = markup.replace(/\$\{destino\}/i, destino);
                markup = markup.replace(/\$\{fecha\}/i, fecha);
                markup = markup.replace(/\$\{hora\}/i, hora);
                markup = markup.replace(/\$\{demora\}/i, demora);
                markup = markup.replace(/\$\{arribo\}/i, arribo);
                markup = markup.replace(/\$\{clase\}/i, clase);
                $('#tviajes').append($(markup));
            }
            $.each(warning, function (key,value) {
            	myTween(value, "#DFF0D8", "#FCF8E3");
            });
            $.each(danger, function (key,value) {
            	myTween(value, "#FCF8E3", "#F2DEDE");
            });
	   	}
	});
}

function diferencia_minutos(fecha, hora1) {
	var actual = new Date();
	var hoy = new Date(actual.getFullYear(),actual.getMonth(),actual.getDate(),hora, min, seg);
	var f_viaje = new Date(fecha.substr(6, 4),(fecha.substr(3, 2)-1),fecha.substr(0, 2),hora1.substr(0, 2),hora1.substr(3, 2));
	var diff = f_viaje - hoy;
	var minutos = Math.ceil(((diff/1000)/3600)*60);
	return minutos;
}

function descartar_viaje(id) {
	$.ajax({
		url: 'index.php/viajes/eliminarViaje',
	   	type: 'POST',
	   	data: {id_viaje: id},
	   	error: function() {
      		console.log("error en llamada ajax");
	   	},
	   	success: function(data) {
	   		console.log(data);
	   	}
	});
}

function myTween(id, color_origen, color_destino) {
	$(".td"+id).tween({
		height:{
			start: 20,
			stop: 80,
			units: 'px',
			duration: 0
		},
		backgroundColor : {
			start: color_origen,
			stop: color_destino,
			duration: 0
		},
		fontSize:{
			start: 15,
			stop: 35,
			units: 'px',
			duration: 0
		}
	});
	$.play();
	$(".td"+id).tween({
		height:{
			start: 80,
			stop: 20,
			units: 'px',
			time: 4,
			duration: 0
		},
		fontSize:{
			start: 35,
			stop: 15,
			units: 'px',
			time: 4,
			duration: 0
		}
	});
	$.play();
}