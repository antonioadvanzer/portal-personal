/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.tracks')
      .controller('TracksModuleCtrl', TracksModuleCtrl);

  /** @ngInject */
  function TracksModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
    //var vm = this;
      
/* Tracks table -------------------------------------------------------------------------------*/
      
    $scope.getTracksActive = function(){
        return $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.refreshTables = function(){
        
        $scope.listaTracks_loaded = false;
        
        $scope.getTracksActive().then(function(data) {
            $scope.tracks_table.listaTracks = data;
            $scope.tracks_table.tracks = data;
            $scope.listaTracks_loaded = true;
        });
    }
    
    $scope.tracks_table = [];
      
      $scope.listaTracks_loaded = false;
      
    $scope.tracks_table.listaTracks = [];
    $scope.tracks_table.tamanioTablaTracks = 10;
      
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
      
    $scope.showTrack = function (id){
        
        $http.get("admin-theme/modules/track/get_track/"+id).then(function (response) {
            
            //console.log(response.data);
            
            $scope.formEditTrack.editTrack = false;
            $scope.formEditTrack.id = response.data.id;
            $scope.formEditTrack.inputTrackName = response.data.name;
            
            // capable of being eliminated
            $scope.formEditTrack.eliminable = response.data.eliminable;
            
            $http.get("admin-theme/modules/track/positions_by_track/"+response.data.id).then(function (response) {
              $scope.formEditTrack.posicionesPorTrack = response.data;
            });
            
            $scope.refreshTables();
            $state.go('tracks.track_detalle');
        });
        
    }

/*--------------------------------------------------------------------------------------------------*/
/* New track -------------------------------------------------------------------------------*/
        
      $scope.track = {};
      
      $scope.save = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("tr_name", $scope.track.inputTrackName); 
          
        $http.post('admin-theme/modules/track/store_new_track', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Dirección guardada correctamente');
            resetForm("tracks.agregar");
            
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
  /* Show track ----------------------------------------------------------------------------------*/

    $scope.formEditTrack={};

    $scope.formEditTrack.editTrack = false;
      
  /*--------------------------------------------------------------------------------------------*/
  /* Update track ----------------------------------------------------------------------------------*/
    
    $scope.formEditTrack.enableEdit = function (){
        $scope.formEditTrack.editTrack = true;
    };

    $scope.formEditTrack.returnTable = function (){
        resetForm("direcciones.lista_direcciones");
    };

    $scope.formEditTrack.cancelEdit = function (){
        $scope.formEditTrack.editTrack = false;
    };
      
    $scope.formEditTrack.delete = function (){
        $http.get("admin-theme/modules/track/delete_track/"+$scope.formEditTrack.id).then(function (response) {
            console.log(response);
            getAlert('theme/success_modal/Track eliminada correctamente');
            resetForm("tracks.lista_tracks");
        });
    };

    $scope.formEditTrack.updateTrack = function (){
        
        $scope.sending = true;

        var formData = new FormData();

        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("tr_id", $scope.formEditTrack.id);
        formData.append("tr_name", $scope.formEditTrack.inputTrackName); 
          
        $http.post('admin-theme/modules/track/update_track', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Track actualizado correctamente');
            resetForm("tracks.lista_tracks");
            
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