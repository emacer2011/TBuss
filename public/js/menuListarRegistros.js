$(function(){
	$("#menuRegistros").addClass("active");
	$("#menuRegistros").css("background-color", "#35A1C0");
	$("#ocultar-panel").click(ocultar_panel_menu);
	$("#ver-panel").click(ver_panel_menu);
});

ocultar_panel_menu: function ocultar_panel_menu(){
	$("#ocultar-panel").css({"visibility":"hidden"});
	$("#ver-panel").css({"visibility":"visible"});
	$(".navbar").css({"visibility":"hidden"});
	$(".jumbotron").css({"margin-top":"-60px"});
};

ver_panel_menu: function ver_panel_menu(){
	$("#ver-panel").css({"visibility":"hidden"});
	$("#ocultar-panel").css({"visibility":"visible"});
	$(".navbar").css({"visibility":"visible"});
	$(".jumbotron").css({"margin-top":"60px"});
};