/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.profile')
    .controller('ProfilePageCtrl', ProfilePageCtrl);

  /** @ngInject */
  function ProfilePageCtrl($scope, $http, $state, fileReader, $filter, $uibModal) {
    
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
      
    //$scope.formEditUser = [];
      
    $scope.goBack = function (){
        window.history.back();
    };
      
    $scope.showUser = function (id){

        $http.get("theme/modules/user/get_user/"+id).then(function (response) {
            
            console.log(response.data);
            
            /*$scope.formEditUser.editUser = false;
            $scope.formEditUser.noPicture = true;*/
            
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
            $scope.formEditUser.inputTotalDays = response.data.us_total_days_available;
            //$scope.refreshTables();
            $state.go('empleado');
        });
        
        getAditionaInformation(id);
    }
      
    function getAditionaInformation(id_user){
        $.getJSON("theme/modules/user/get_all_requests_by_user/"+id_user, function( data ) {
            $scope.requests_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.requests_table.solicitudesPorUsuario = data;
            console.log(data);
            $scope.$apply();
        });
        
        $.getJSON("theme/modules/user/get_all_letter_by_user/"+id_user, function( data ) {
            $scope.letter_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.letter_table.solicitudesPorUsuario = data;
            //console.log(data);
            $scope.$apply();
        });
        
        /*$.getJSON("theme/modules/user/list_days_by_user/"+id_user, function( data ) {
            $scope.vacations_table.vacations_days = data;
            console.log(data);
            $scope.$apply();
        });*/
        
        $.getJSON("theme/modules/vacations/list_days_vacations_by_user/"+id_user, function( data ) {
            $scope.vacations_table.vacations_days = data;
            //console.log(data);
            $scope.$apply();
        });
    }
      
    /* Show formRequest by User ------------------------------------------------------------------------------------*/
      
    $scope.formRequest.active_view_request = false;
    
    $scope.showRequest = function (id){
        
        $http.get("theme/modules/user/get_request/"+id).then(function (response) {
          //console.log(response.data);
            $scope.formRequest.inputRequestId = response.data.id;
            $scope.formRequest.inputRequestColaborador = response.data.nombre_colaborador;
            $scope.formRequest.inputRequestAutorizador = response.data.nombre_autorizador;
            $scope.formRequest.inputRequestDias = response.data.dias;
            $scope.formRequest.inputRequestEstado = response.data.estado;
            $scope.formRequest.inputRequestTipo = response.data.tipo;
            $scope.formRequest.inputRequestMotivo = response.data.motivo;
            $scope.formRequest.inputRequestDesde = response.data.desde;
            $scope.formRequest.inputRequestHasta = response.data.hasta;
            $scope.formRequest.inputRequestRegresa = response.data.regresa;
            $scope.formRequest.inputRequestObservationes = response.data.observaciones;
            $scope.formRequest.inputRequestAuthBoss = response.data.aut_jefe;
            $scope.formRequest.inputRequestAuthCh = response.data.aut_ch;
            
            $scope.formRequest.inputRequestMotivoCancelacion = response.data.razon_cancelacion;
            $scope.formRequest.inputRequestOcacion = response.data.ocacion;
            
            $scope.formRequest.labelRequestStatus = response.data.status;
            $scope.formRequest.labelRequestType = response.data.type;
            
            $scope.formRequest.active_view_request = true;
            $scope.formRequest.requestStatus = true;
            
            getAditionaInformation($scope.formEditUser.id);
        });
        
    }
      
    $scope.getComprobante = function(){
        getAlert('theme/modules/absence/comprobante_medico/'+$scope.formRequest.inputRequestId);
    }
    
    $scope.returnRequestByUser = function() {
        $scope.formRequest.active_view_request = false;
    };
    
    /*--------------------------------------------------------------------------------------------------*/
    
    /* Show formLetter by User ------------------------------------------------------------------------------------*/
      
      $scope.formLetter.active_view_letter = false;
      
      $scope.showLetter = function (id){
        
        $http.get("theme/modules/user/get_letter/"+id).then(function (response) {
            //console.log(response.data);
            
            $scope.formLetter.inputLetterId = response.data.id;
            $scope.formLetter.inputLetterColaborador = response.data.colaborador;
            $scope.formLetter.inputLetterDirigidoA = response.data.dirigido;
            $scope.formLetter.inputLetterSueldo = response.data.sueldo;
            $scope.formLetter.inputLetterIMSS = response.data.imss;
            $scope.formLetter.inputLetterRFC = response.data.rfc;
            $scope.formLetter.inputLetterCURP = response.data.curp;
            $scope.formLetter.inputLetterAntiguedad = response.data.antiguedad;
            $scope.formLetter.inputLetterPuesto = response.data.puesto;
            $scope.formLetter.inputLetterDomicilio = response.data.domicilio;
            $scope.formLetter.inputLetterObservaciones = response.data.observaciones;
            
            getAditionaInformation($scope.formEditUser.id);
            $scope.formLetter.active_view_letter = true;
        });
        
    }
    
    $scope.returnLetterByUser = function() {

        $scope.formLetter.active_view_letter = false;
        
    };
      
    /*--------------------------------------------------------------------------------------------------*/
      
  }

})();
