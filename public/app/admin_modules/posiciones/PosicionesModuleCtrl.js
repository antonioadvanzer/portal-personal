/**
 * @author Antonio Baez
 * created on 19.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.posiciones')
      .controller('PosicionesModuleCtrl', PosicionesModuleCtrl);

  /** @ngInject */
  function PosicionesModuleCtrl($scope, $http , $filter, $window, $location, $state, $uibModal, $timeout, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Areas table -------------------------------------------------------------------------------*/
    
    $scope.getPosiciones = function(){
        return $http.get("admin-theme/modules/position/list_positions").then(function (response) {
          return response.data;
        });
    }
    
    $scope.refreshTables = function(){
        $scope.getPosiciones().then(function(data) {
            $scope.listaPosiciones = data;
        });  
    }
      
    $scope.tamanioTablaPosiciones = 10;

    $scope.listaPosiciones = [];
      
    $scope.refreshTables();
      
    $scope.showPosition = function (id){
        $http.get("admin-theme/modules/position/get_position/"+id).then(function (response) {
            
            console.log(response.data);

            $http.get("admin-theme/modules/level/list_levels").then(function (response) {
                $scope.pe_standardSelectLevels = response.data;
            });
            
            $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
                $scope.formEditPosition.pe_tracksList = response.data;
                $scope.formEditPosition.pe_tracksBool = new Array($scope.formEditPosition.pe_tracksList.length); 
                $scope.formEditPosition.tracksList = response.data;
                $scope.formEditPosition.tracksBool = new Array($scope.formEditPosition.tracksList.length); 
            });
            
            $http.get("admin-theme/modules/position/track_by_position/"+id).then(function (response) {
                //console.log(response.data);
                
                var val_tr = response.data;
                var total_reg = 0;
                // check important!!!! -----
                //console.log("datos:");
                for(var j = 0; j < val_tr.length; j++){
                    
                    for(var k = 0; k < $scope.formEditPosition.pe_tracksList.length; k++){
                        //console.log($scope.formEditPosition.tracksList[k].id+" "+val_tr[j].id_track);
                        if($scope.formEditPosition.tracksList[k].id == val_tr[j].id_track){
                            //console.log($scope.formEditPosition.tracksList[k]);
                            //console.log($scope.formEditPosition.tracksBool[k]);
                            $scope.formEditPosition.tracksBool[k] = true;
                            $scope.formEditPosition.pe_tracksBool[k] = true;
                            //console.log(val_tr[j].used);
                            total_reg += val_tr[j].used;
                            if(val_tr[j].used){
                                //console.log("tp"+$scope.formEditPosition.tracksList[k].id);
                                //$("tp"+$scope.formEditPosition.tracksList[k].id).addClass("ng-disabled");
                                $scope.formEditPosition.tracksList[k].active=false;
                            }else{
                                //$scope.formEditPosition.tracksList[k].active=true;
                            }
                            
                        }
                    }
                }
                
                $scope.formEditPosition.total_reg = total_reg;
                
            });

            $scope.formEditPosition.editPosition = false;
            $scope.formEditPosition.id = response.data.id;
            $scope.formEditPosition.inputPositionName = response.data.name;
            $scope.pe_selectedLevel.selected = {id: response.data.ps_level_id, name: response.data.ps_level_name};
            $scope.formEditPosition.inputPositionLevel = response.data.ps_level_name;

            // capable of being eliminated
            $scope.formEditPosition.eliminable = response.data.eliminable;

            var pms = ""+response.data.ps_permissions;
            var permisos = pms.split(',');

            console.log(permisos);

            $scope.formEditPosition.inputPositionPermission1 = false;
            $scope.formEditPosition.inputPositionPermission2 = false;
            $scope.formEditPosition.inputPositionPermission3 = false;
            $scope.formEditPosition.inputPositionPermission4 = false;
            $scope.formEditPosition.inputPositionPermission5 = false;
            $scope.formEditPosition.inputPositionPermission6 = false;
            $scope.formEditPosition.inputPositionPermission7 = false;
            $scope.formEditPosition.inputPositionPermission8 = false;
            $scope.formEditPosition.inputPositionPermission9 = false;
            $scope.formEditPosition.ep_inputPositionPermission1 = false;
            $scope.formEditPosition.ep_inputPositionPermission2 = false;
            $scope.formEditPosition.ep_inputPositionPermission3 = false;
            $scope.formEditPosition.ep_inputPositionPermission4 = false;
            $scope.formEditPosition.ep_inputPositionPermission5 = false;
            $scope.formEditPosition.ep_inputPositionPermission6 = false;
            $scope.formEditPosition.ep_inputPositionPermission7 = false;
            $scope.formEditPosition.ep_inputPositionPermission8 = false;
            $scope.formEditPosition.ep_inputPositionPermission9 = false;
            
            for(var i = 0; i <= permisos.length; i++) {
                switch(permisos[i]){
                       case '1':
                        $scope.formEditPosition.inputPositionPermission1 = true;
                        $scope.formEditPosition.ep_inputPositionPermission1 = true;
                       break;
                       case '2':
                        $scope.formEditPosition.inputPositionPermission2 = true;
                        $scope.formEditPosition.ep_inputPositionPermission2 = true;
                       break;
                       case '3':
                        $scope.formEditPosition.inputPositionPermission3 = true;
                        $scope.formEditPosition.ep_inputPositionPermission3 = true;
                       break;
                       case '4':
                        $scope.formEditPosition.inputPositionPermission4 = true;
                        $scope.formEditPosition.ep_inputPositionPermission4 = true;
                       break;
                       case '5':
                        $scope.formEditPosition.inputPositionPermission5 = true;
                        $scope.formEditPosition.ep_inputPositionPermission5 = true;
                       break;
                       case '6':
                        $scope.formEditPosition.inputPositionPermission6 = true;
                        $scope.formEditPosition.ep_inputPositionPermission6 = true;
                       break;
                       case '7':
                        $scope.formEditPosition.inputPositionPermission7 = true;
                        $scope.formEditPosition.ep_inputPositionPermission7 = true;
                       break;
                       case '8':
                        $scope.formEditPosition.inputPositionPermission8 = true;
                        $scope.formEditPosition.ep_inputPositionPermission8 = true;
                       break;
                       case '9':
                        $scope.formEditPosition.inputPositionPermission9 = true;
                        $scope.formEditPosition.ep_inputPositionPermission9 = true;
                       break;
                }
            }
            
            $scope.refreshTables();
            $state.go('posiciones.posicion_detalle');
        });
    }  
      
  /*--------------------------------------------------------------------------------------------*/
  /* New Position -------------------------------------------------------------------------------*/
        
      $scope.position = {};
      
      $scope.selectedLevel = {};
      $scope.standardLevel = {};
      $scope.standardSelectLevel = [];
      
      $scope.position.tracksList = [];
      $scope.position.tracksBool = []; 
      
      $http.get("admin-theme/modules/level/list_levels").then(function (response) {
        $scope.standardSelectLevel = response.data;
      });
      
      //$scope.tracksList = [];
      
      $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
        $scope.position.tracksList = response.data;
        $scope.position.tracksBool = new Array($scope.position.tracksList.length) 
      });
      
      $scope.save = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        formData.append("ps_name", $scope.position.inputPositionName);
        formData.append("ps_level", $scope.selectedLevel.selected.id);
        
        var permissions = "";
          
        if($scope.position.inputPositionPermission1){
            permissions+="1-";
        }
        if($scope.position.inputPositionPermission2){
            permissions+="2-";
        }
        if($scope.position.inputPositionPermission3){
            permissions+="3-";
        }
        if($scope.position.inputPositionPermission4){
            permissions+="4-";
        }
        if($scope.position.inputPositionPermission5){
            permissions+="5-";
        }
        if($scope.position.inputPositionPermission6){
            permissions+="6-";
        }
        if($scope.position.inputPositionPermission7){
            permissions+="7-";
        }
        if($scope.position.inputPositionPermission8){
            permissions+="8-";
        }
        if($scope.position.inputPositionPermission9){
            permissions+="9-";
        }
          
        formData.append("ps_permissions", permissions);
          
        var trs = "";
          
        for(var i = 0; i < $scope.position.tracksBool.length; i++){
            
            if($scope.position.tracksBool[i]){
               trs+=$scope.position.tracksList[i].id+"-";
            }
        }
        
        formData.append("ps_tracks", trs);
          
        $http.post('admin-theme/modules/position/store_new_position', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Posición guardada correctamente');
            resetForm("posiciones.agregar");

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
  /* Show position ----------------------------------------------------------------------------------*/

    $scope.formEditPosition={};

    $scope.formEditPosition.editPosition = false;
      
    $scope.formEditPosition.tracksList = [];
    $scope.formEditPosition.tracksBool = [];
    
    $scope.formEditPosition.pe_tracksList = [];
    $scope.formEditPosition.pe_tracksBool = []; 

  /*--------------------------------------------------------------------------------------------*/
  /* Update position ----------------------------------------------------------------------------------*/
      
    $scope.pe_selectedLevel = {};
    $scope.pe_standardLevel = {};
    $scope.pe_standardSelectLevels = [];
      
    $scope.formEditPosition.enableEdit = function (){
        $scope.formEditPosition.editPosition = true;
    };

    $scope.formEditPosition.returnTable = function (){
        resetForm("posiciones.lista_posiciones");
    };

    $scope.formEditPosition.cancelEdit = function (){
        $scope.formEditPosition.editPosition = false;
    };
      
    $scope.formEditPosition.delete = function (){
        $http.get("admin-theme/modules/position/delete_position/"+$scope.formEditPosition.id).then(function (response) {
            console.log(response);
            getAlert('theme/success_modal/Posición eliminada correctamente');
            resetForm("posiciones.lista_posiciones");
        });
    };
      
    $scope.formEditPosition.updatePosition = function (){
        //check---
        $scope.sending = true;
        
        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("ps_id", $scope.formEditPosition.id);
        formData.append("ps_name", $scope.formEditPosition.inputPositionName);
        formData.append("ps_level", $scope.pe_selectedLevel.selected.id);
        
        var permissions = "";
          
        if($scope.formEditPosition.inputPositionPermission1){
            permissions+="1-";
        }
        if($scope.formEditPosition.inputPositionPermission2){
            permissions+="2-";
        }
        if($scope.formEditPosition.inputPositionPermission3){
            permissions+="3-";
        }
        if($scope.formEditPosition.inputPositionPermission4){
            permissions+="4-";
        }
        if($scope.formEditPosition.inputPositionPermission5){
            permissions+="5-";
        }
        if($scope.formEditPosition.inputPositionPermission6){
            permissions+="6-";
        }
        if($scope.formEditPosition.inputPositionPermission7){
            permissions+="7-";
        }
        if($scope.formEditPosition.inputPositionPermission8){
            permissions+="8-";
        }
        if($scope.formEditPosition.inputPositionPermission9){
            permissions+="9-";
        }
          
        formData.append("ps_permissions", permissions);
        
        
        var trs = "";
        var c_trs = "";
        var d_trs = "";
          
        for(var i = 0; i < $scope.position.tracksBool.length; i++){
            
            if($scope.formEditPosition.tracksList[i].active){
                trs+=$scope.formEditPosition.tracksList[i].id+"-";
                if($scope.formEditPosition.tracksBool[i]){
                   c_trs+=$scope.formEditPosition.tracksList[i].id+"-";
                }else{
                    d_trs+=$scope.formEditPosition.tracksList[i].id+"-";
                }
            }
        }
        
        formData.append("ps_tracks", trs);
        formData.append("ps_tracks_create", c_trs);
        formData.append("ps_tracks_delete", d_trs);
        
        console.log("encendidos: "+c_trs);
        console.log("apagados: "+d_trs);
        $http.post('admin-theme/modules/position/update_position', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Posición actualizada correctamente');
            resetForm("posiciones.lista_posiciones");

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