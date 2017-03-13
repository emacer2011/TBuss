app.controller('usuarioApiCtrl', ['$http', controladorListadoUsuarios]);

function controladorListadoUsuarios($http) {
    var scope=this;
    scope.buscarUsuarios = function() {
        //efecto boton activo
        $(".activeMenu").removeClass("activeMenu");
        $("#menuPermisos").addClass("activeMenu");

        $http.get(scope.urlUsuarios).success(function(respuesta){
            $("#myContentUser").html(respuesta);
        }).error(function(respuesta){
            var $result = $(respuesta);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
        });
    }
    scope.buscarPermisos = function() {
        //efecto boton activo
        $(".activeMenu").removeClass("activeMenu");
        $("#menuRoles").addClass("activeMenu");

        $http.get(scope.urlPermisos).success(function(respuesta){
            $("#myContentUser").html(respuesta);
        }).error(function(respuesta){
            var $result = $(respuesta);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
        });
    };
    scope.formUrl = function() {
        //efecto boton activo
        $(".activeMenu").removeClass("activeMenu");
        $("#menuAltaUrl").addClass("activeMenu");

        $http.get(scope.urlForm)
        .success(function(respuesta){
            $("#myContentUser").html(respuesta);
        })
        .error(function(respuesta){
            var $result = $(respuesta);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
        });
    };
    scope.buscarUrls = function() {
        //efecto boton activo
        $(".activeMenu").removeClass("activeMenu");
        $("#menuUrl").addClass("activeMenu");

        $http.get(scope.urlListadoUrl).success(function(respuesta){
            $("#myContentUser").html(respuesta);
        }).error(function(respuesta){
            var $result = $(respuesta);
            var $error_selection = $result.find('div.container-error');
            $("#myContentUser").html($error_selection);
        });
    }
}