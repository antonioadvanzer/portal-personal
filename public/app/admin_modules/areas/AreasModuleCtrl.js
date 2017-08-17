/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.areas')
      .controller('AreasModuleCtrl', AreasModuleCtrl);

  /** @ngInject */
  function AreasModuleCtrl($scope, $http , $filter, $window, $location, $state, $uibModal, $timeout, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Areas table -------------------------------------------------------------------------------*/
    
    $scope.getAreas = function(){
    //function getAreas(){
        return $http.get("admin-theme/modules/area/list_areas").then(function (response) {
        //$.getJSON("admin-theme/modules/area/list_areas", function( data ) {
            return response.data;
            //$scope.areas_table.listaAreas = data;
            //$scope.$apply();
        });
    }
    
    $scope.refreshTables = function(){
        $scope.getAreas().then(function(data) {
            $scope.areas_table.listaAreas = data;
        }); 
        
        //getAreas();
    }
    
    $scope.areas_table = [];
      
    $scope.areas_table.tamanioTablaAreas = 10;
      
    $scope.areas_table.listaAreas = [];
      
    //$scope.refreshTables();
    $timeout(function() {
        $scope.refreshTables();
    }, 2000);
      
    $scope.showArea = function (id){
        $http.get("admin-theme/modules/area/get_area/"+id).then(function (response) {
            
            console.log(response.data);
            
            $http.get("admin-theme/modules/direction/list_directions").then(function (response) {
                $scope.ae_standardSelectDirections = response.data;
            });
            
            $scope.formEditArea.editArea = false;
            $scope.formEditArea.id = response.data.id;
            $scope.formEditArea.inputAreaName = response.data.name;
            $scope.ae_selectedDirection.selected = {id: response.data.ar_direction_id, name: response.data.ar_direction_name};
            $scope.formEditArea.inputAreaDirection = response.data.ar_direction_name;
            
            // capable of being eliminated
            $scope.formEditArea.eliminable = response.data.eliminable;
            
            var pms = ""+response.data.ar_permissions;
            var permisos = pms.split(',');
            
            console.log(permisos);
            
            $scope.formEditArea.inputAreaPermission1 = false;
            $scope.formEditArea.inputAreaPermission2 = false;
            $scope.formEditArea.inputAreaPermission3 = false;
            $scope.formEditArea.inputAreaPermission4 = false;
            $scope.formEditArea.inputAreaPermission5 = false;
            $scope.formEditArea.inputAreaPermission6 = false;
            $scope.formEditArea.inputAreaPermission7 = false;
            $scope.formEditArea.inputAreaPermission8 = false;
            $scope.formEditArea.inputAreaPermission9 = false;
            $scope.formEditArea.ea_inputAreaPermission1 = false;
            $scope.formEditArea.ea_inputAreaPermission2 = false;
            $scope.formEditArea.ea_inputAreaPermission3 = false;
            $scope.formEditArea.ea_inputAreaPermission4 = false;
            $scope.formEditArea.ea_inputAreaPermission5 = false;
            $scope.formEditArea.ea_inputAreaPermission6 = false;
            $scope.formEditArea.ea_inputAreaPermission7 = false;
            $scope.formEditArea.ea_inputAreaPermission8 = false;
            $scope.formEditArea.ea_inputAreaPermission9 = false;
            
            for(var i = 0; i <= permisos.length; i++) {
                switch(permisos[i]){
                       case '1':
                        $scope.formEditArea.inputAreaPermission1 = true;
                        $scope.formEditArea.ea_inputAreaPermission1 = true;
                       break;
                       case '2':
                        $scope.formEditArea.inputAreaPermission2 = true;
                        $scope.formEditArea.ea_inputAreaPermission2 = true;
                       break;
                       case '3':
                        $scope.formEditArea.inputAreaPermission3 = true;
                        $scope.formEditArea.ea_inputAreaPermission3 = true;
                       break;
                       case '4':
                        $scope.formEditArea.inputAreaPermission4 = true;
                        $scope.formEditArea.ea_inputAreaPermission4 = true;
                       break;
                       case '5':
                        $scope.formEditArea.inputAreaPermission5 = true;
                        $scope.formEditArea.ea_inputAreaPermission5 = true;
                       break;
                       case '6':
                        $scope.formEditArea.inputAreaPermission6 = true;
                        $scope.formEditArea.ea_inputAreaPermission6 = true;
                       break;
                       case '7':
                        $scope.formEditArea.inputAreaPermission7 = true;
                        $scope.formEditArea.ea_inputAreaPermission7 = true;
                       break;
                       case '8':
                        $scope.formEditArea.inputAreaPermission8 = true;
                        $scope.formEditArea.ea_inputAreaPermission8 = true;
                       break;
                       case '9':
                        $scope.formEditArea.inputAreaPermission9 = true;
                        $scope.formEditArea.ea_inputAreaPermission9 = true;
                       break;
                }
            }
            
            $scope.refreshTables();
            $state.go('areas.area_detalle');
        });
    }  
      
  /*--------------------------------------------------------------------------------------------*/
  /* New Area -------------------------------------------------------------------------------*/
        
      $scope.area = {};
      //$scope.area.inputAreaName = "";
      
      $scope.selectedDirection = {};
      $scope.standardDirection = {};
      $scope.standardSelectDirection = [];
      
      $http.get("admin-theme/modules/direction/list_directions").then(function (response) {
        $scope.standardSelectDirection = response.data;
      });
      
      $scope.save = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        formData.append("ar_name", $scope.area.inputAreaName);
        formData.append("ar_direction", $scope.selectedDirection.selected.id);
        
        var permissions = "";
          
        if($scope.area.inputAreaPermission1){
            permissions+="1-";
        }
        if($scope.area.inputAreaPermission2){
            permissions+="2-";
        }
        if($scope.area.inputAreaPermission3){
            permissions+="3-";
        }
        if($scope.area.inputAreaPermission4){
            permissions+="4-";
        }
        if($scope.area.inputAreaPermission5){
            permissions+="5-";
        }
        if($scope.area.inputAreaPermission6){
            permissions+="6-";
        }
        if($scope.area.inputAreaPermission7){
            permissions+="7-";
        }
        if($scope.area.inputAreaPermission8){
            permissions+="8-";
        }
        if($scope.area.inputAreaPermission9){
            permissions+="9-";
        }
          
        formData.append("ar_permissions", permissions);

        $http.post('admin-theme/modules/area/store_new_area', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Area guardada correctamente');
            resetForm("areas.agregar");

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
      
  /*--------------------------------------------------------------------------------------------*/
  /* Show area ----------------------------------------------------------------------------------*/

    $scope.formEditArea={};

    $scope.formEditArea.editArea = false;

  /*--------------------------------------------------------------------------------------------*/
  /* Update area ----------------------------------------------------------------------------------*/
      
    $scope.ae_selectedDirection = {};
    $scope.ae_standardDirection = {};
    $scope.ae_standardSelectDirections = [];
      
    $scope.formEditArea.enableEdit = function (){
        $scope.formEditArea.editArea = true;
    };

    $scope.formEditArea.returnTable = function (){
        resetForm("direcciones.lista_areas");
    };

    $scope.formEditArea.cancelEdit = function (){
        $scope.formEditArea.editArea = false;
    };
      
    $scope.formEditArea.delete = function (){
        $http.get("admin-theme/modules/area/delete_area/"+$scope.formEditArea.id).then(function (response) {
            console.log(response);
            getAlert('theme/success_modal/Area eliminada correctamente');
            resetForm("areas.lista_areas");
        });
    };
      
    $scope.formEditArea.updateArea = function (){
        
        $scope.sending = true;
        
        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("ar_id", $scope.formEditArea.id);
        formData.append("ar_name", $scope.formEditArea.inputAreaName);
        formData.append("ar_direction", $scope.ae_selectedDirection.selected.id);
        
        var permissions = "";
          
        if($scope.formEditArea.inputAreaPermission1){
            permissions+="1-";
        }
        if($scope.formEditArea.inputAreaPermission2){
            permissions+="2-";
        }
        if($scope.formEditArea.inputAreaPermission3){
            permissions+="3-";
        }
        if($scope.formEditArea.inputAreaPermission4){
            permissions+="4-";
        }
        if($scope.formEditArea.inputAreaPermission5){
            permissions+="5-";
        }
        if($scope.formEditArea.inputAreaPermission6){
            permissions+="6-";
        }
        if($scope.formEditArea.inputAreaPermission7){
            permissions+="7-";
        }
        if($scope.formEditArea.inputAreaPermission8){
            permissions+="8-";
        }
        if($scope.formEditArea.inputAreaPermission9){
            permissions+="9-";
        }
          
        formData.append("ar_permissions", permissions);

        $http.post('admin-theme/modules/area/update_area', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Area actualizada correctamente');
            resetForm("areas.lista_areas");

        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al actualizar');
        });
    }
  /*--------------------------------------------------------------------------------------------*/
  }

})();