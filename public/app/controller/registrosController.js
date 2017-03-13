app.controller('eliminarApiCtrl', ['$http', controladorEliminarRegistro]);

function controladorEliminarRegistro($http) {
    var scope=this;
    
    scope.buscarRegistros = function() {
        $http.get(scope.url).success(function(respuesta){
            scope.registros = respuesta;
        }).error(function(respuesta){
            var $result = $(respuesta);
            var $error_selection = $result.find('div.container-error');
            $(".main-container").html($error_selection);
        });
    };
    scope.eliminarRegistro = function(id) {
        var config = {"id":id[0][0]};
        $http.post(scope.url,config)
            .success(function(respuesta){
                scope.registros = respuesta;
            }).error(function(respuesta){
                var $result = $(respuesta);
                var $error_selection = $result.find('div.container-error');
                $(".main-container").html($error_selection);
        });
    }
}