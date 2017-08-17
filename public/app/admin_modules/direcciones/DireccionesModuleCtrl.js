/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.direcciones')
      .controller('DireccionesModuleCtrl', DireccionesModuleCtrl);

  /** @ngInject */
  function DireccionesModuleCtrl($scope, $http , $filter, $window, $location, $state, $uibModal, $timeout, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Direcciones table -------------------------------------------------------------------------------*/
      
    $scope.getDirections = function(){
    //function getDirections(){
        return $http.get("admin-theme/modules/direction/list_directions").then(function (response) {
        //$.getJSON("admin-theme/modules/direction/list_directions", function( data ) {
            return response.data;
            //$scope.directions_table.listaDirecciones = data;
            //$scope.$apply();
        });
    }
      
    $scope.refreshTables = function(){
        $scope.getDirections().then(function(data) {
            $scope.directions_table.listaDirecciones = data;
        });
        
        //getDirections();
    }
    
    $scope.directions_table = [];
    
    $scope.directions_table.tamanioTablaDirecciones = 10;
      
    $scope.directions_table.listaDirecciones = [];
    
    //$scope.refreshTables();
    $timeout(function() {
        $scope.refreshTables();
    }, 2000);
      
    $scope.showDirection = function (id){
        $http.get("admin-theme/modules/direction/get_direction/"+id).then(function (response) {
            
            //console.log(response.data);
            
            $scope.formEditDirection.editDirection = false;
            $scope.formEditDirection.id = response.data.id;
            $scope.formEditDirection.inputDirectionName = response.data.name;
            
            // capable of being eliminated
            $scope.formEditDirection.eliminable = response.data.eliminable;
            
            $http.get("admin-theme/modules/direction/areas_by_direction/"+response.data.id).then(function (response) {
              $scope.formEditDirection.areasPorDireccion = response.data;
            });
            
            $scope.refreshTables();
            $state.go('direcciones.direccion_detalle');
        });
    }
      
  /*--------------------------------------------------------------------------------------------*/
  /* New direction -------------------------------------------------------------------------------*/
        
      $scope.direction = {};
      //$scope.direction.inputDirectionName = "";
      
      $scope.save = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("dir_name", $scope.direction.inputDirectionName); 
          
        $http.post('admin-theme/modules/direction/store_new_direction', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Dirección guardada correctamente');
            resetForm("direcciones.agregar");
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al guardar');
        });
      }
      
    function resetForm(stateName) {
        if ($state.is(stateName)) {
            $state.reload();
        } else {
            $state.go(stateName);
        }
    }

    function getAlert(page, size){
        $uibModal.open({
            animation: true,
            templateUrl: page,
            size: size,
            resolve: {
            /*items: function () {
            return $scope.items;
            }*/
            }
        });
    }

    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
      
  /*--------------------------------------------------------------------------------------------------*/
  /* Show direction ----------------------------------------------------------------------------------*/

    $scope.formEditDirection={};

    $scope.formEditDirection.editDirection = false;
      
  /*--------------------------------------------------------------------------------------------*/
  /* Update direction ----------------------------------------------------------------------------------*/
    
    $scope.formEditDirection.enableEdit = function (){
        $scope.formEditDirection.editDirection = true;
    };

    $scope.formEditDirection.returnTable = function (){
        resetForm("direcciones.lista_direcciones");
    };

    $scope.formEditDirection.cancelEdit = function (){
        $scope.formEditDirection.editDirection = false;
    };
      
    $scope.formEditDirection.delete = function (){
        $http.get("admin-theme/modules/direction/delete_direction/"+$scope.formEditDirection.id).then(function (response) {
            console.log(response);
            getAlert('theme/success_modal/Dirección eliminada correctamente');
            resetForm("direcciones.lista_direcciones");
        });
    };

    $scope.formEditDirection.updateDirection = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("dir_id", $scope.formEditDirection.id);
        formData.append("dir_name", $scope.formEditDirection.inputDirectionName); 
          
        $http.post('admin-theme/modules/direction/update_direction', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Dirección actualizada correctamente');
            resetForm("direcciones.lista_direcciones");
            
        })
        .error(function (response) {
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al actualizar');
        });
    };
      
  /*--------------------------------------------------------------------------------------------*/
  }

})();