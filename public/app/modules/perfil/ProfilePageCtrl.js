/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.profile')
    .controller('ProfilePageCtrl', ProfilePageCtrl);

  /** @ngInject */
  function ProfilePageCtrl($scope, $http, fileReader, $filter, $uibModal) {
    
    var vm = this;
      
    $scope.getPersonalACargo = function(){
        return $http.get("theme/modules/user/users_employed/"+$scope.user.id).then(function (response) {
            return $scope.personalACargo = response.data;
        });
    }
      
    $scope.refreshTables = function(){
        
        $scope.getPersonalACargo().then(function(data) {
            $scope.perfil.personalACargo = data;
            $scope.perfil.aCargo = data;
        });
        
    }
    
    $scope.perfil = [];
    $scope.perfil.personalACargo = [];
      
    $scope.perfil.tamanioTablaPersonalACargo = 10;
    
    $scope.refreshTables();
      
    $scope.showUser = function (id){

        $http.get("admin-theme/modules/user/get_user/"+id).then(function (response) {
            
            console.log(response.data);
            
            /*$http.get("admin-theme/modules/area/areas_activas").then(function (response) {
              $scope.ue_standardSelectAreas = response.data;
            });
            
            $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
              $scope.ue_standardSelectTracks = response.data;
            });
            
            $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+response.data.us_track_id).then(function (response) {
              $scope.ue_standardSelectPositions = response.data;
            });
            
            $scope.ue_standardSelectCompanies = [
              {id: 1, name: 'Advanzer'},
              {id: 2, name: 'Entuizer'}
            ];
            
            $http.get("admin-theme/modules/user/get_bosses").then(function (response) {
              $scope.ue_standardSelectBosses = response.data;
            });*/ 
            
            $scope.formEditUser.editUser = false;
            $scope.formEditUser.noPicture = true;
            
            $scope.formEditUser.id = response.data.id;
            //$scope.formUser.imageSrc = response.data.photo;
            $scope.formEditUser.imageSrc = $filter('profilePicture')(response.data.us_image,response.data.us_ext);
            $scope.formEditUser.imageProfile = $filter('profilePicture')(response.data.us_image,response.data.us_ext);
            $scope.formEditUser.inputUserName = response.data.name;
            $scope.formEditUser.inputUserApellidoP = response.data.apellido_paterno;
            $scope.formEditUser.inputUserApellidoM = response.data.apellido_materno;
            $scope.formEditUser.inputUserEmail = response.data.email;
            $scope.formEditUser.inputUserPlaza = response.data.plaza;
            $scope.formEditUser.inputUserNomina = response.data.nomina;
            $scope.formEditUser.inputUserFechaIngreso = response.data.fecha_ingreso;
            $scope.formEditUser.inputUserArea = response.data.us_area_name;
            $scope.formEditUser.inputUserDireccion = response.data.us_direccion_name;
            $scope.formEditUser.inputUserTrack = response.data.us_track_name;
            $scope.formEditUser.inputUserPosicion = response.data.us_posicion_name;
            $scope.formEditUser.inputUserCompany = response.data.us_company_name;
            $scope.formEditUser.inputUserBoss = response.data.us_boss_name;
            
            /*$scope.formEditUser.inputUserStatus = response.data.estado;
            $scope.formEditUser.inputMotivoBaja = response.data.motivo;
            
            $scope.formEditUser.inputShowMotivo = response.data.estado == 0 ? true : false;
            
            $scope.formEditUser.inputEliminable = response.data.us_eliminable > 0 ? false : true;
            
            $scope.formEditUser.inputUserBaja = false;
            $scope.formRequest.active_view_request = false;
            $scope.formLetter.active_view_letter = false;*/
            
            /*$scope.ue_selectedArea.selected = {id: response.data.us_area_id, name: response.data.us_area_name};
            $scope.ue_selectedTrack.selected = {id: response.data.us_track_id, name: response.data.us_track_name};
            $scope.ue_selectedPosition.selected = {id: response.data.us_posicion_id, name: response.data.us_posicion_name};
            $scope.ue_selectedCompany.selected = {id: response.data.us_company_id, name: response.data.us_company_name};
            $scope.ue_selectedBoss.selected = {id: response.data.us_boss_id, name: response.data.us_boss_name};*/
            
            
            //$scope.refreshTables();
            //$state.go('perfil.usuario_detalle');
        });
        
        //getAditionaInformation(id);
    }
      
    function getAditionaInformation(id_user){
        $.getJSON("admin-theme/modules/request/get_all_requests_by_user/"+id_user, function( data ) {
            $scope.requests_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.requests_table.solicitudesPorUsuario = data;
            //console.log(data);
            $scope.$apply();
        });
        
        $.getJSON("admin-theme/modules/request/get_all_letter_by_user/"+id_user, function( data ) {
            $scope.letter_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.letter_table.solicitudesPorUsuario = data;
            //console.log(data);
            $scope.$apply();
        });
        
        $.getJSON("admin-theme/modules/vacations/list_days_by_user/"+id_user, function( data ) {
            $scope.vacations_table.vacations_days = data;
            //console.log(data);
            $scope.$apply();
        });
    }
      
  }

})();
