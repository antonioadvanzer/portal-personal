/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.vacaciones')
      .controller('VacacionesModuleCtrl', VacacionesModuleCtrl);

  /** @ngInject */
  function VacacionesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
    //var vm = this;
      
/* Solicitudes table -------------------------------------------------------------------------------*/
      
    $scope.getAllRequest = function(){
    //function getAllRequest(){
        return $http.get("admin-theme/modules/request/get_all_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_all_requests", function( data ) {
            return response.data;
            //$scope.requests_table.todasLasSolicitudes = data;
            //$scope.$apply();
        });  
    }
    
    $scope.getCanceledRequest = function(){
    //function getCanceledRequest(){
        return $http.get("admin-theme/modules/request/get_canceled_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_canceled_requests", function( data ) {
            return response.data;
            //$scope.requests_table.solicitudesCanceladas = data;
            //$scope.$apply();
        });  
    }
    
    $scope.getSendedRequest = function(){
    //function getSendedRequest(){
        return $http.get("admin-theme/modules/request/get_sended_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_sended_requests", function( data ) {
            return response.data;
            //$scope.requests_table.solicitudesEnviadas = data;
            //$scope.$apply();
        });  
    }
    
    $scope.getAceptedRequest = function(){
    //function getAceptedRequest(){
        return $http.get("admin-theme/modules/request/get_acepted_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_acepted_requests", function( data ) {
            return response.data;
            //$scope.requests_table.solicitudesAceptadas = data;
            //$scope.$apply();
        });  
    }
    
    $scope.getRejectedRequest = function(){
    //function getRejectedRequest(){
        return $http.get("admin-theme/modules/request/get_rejected_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_rejected_requests", function( data ) {
            return response.data;
            //$scope.requests_table.solicitudesRechazadas = data;
            //$scope.$apply();
        });  
    }
    
    $scope.getAutorizedRequest = function(){
    //function getAutorizedRequest(){
        return $http.get("admin-theme/modules/request/get_authorized_requests_vacations").then(function (response) {
        //$.getJSON("admin-theme/modules/request/get_authorized_requests", function( data ) {
            return response.data;
            //$scope.requests_table.solicitudesAutorizadas = data;
            //$scope.$apply();
        });  
    }
    
    $scope.refreshTables = function(){
        
        $scope.getAllRequest().then(function(data) {
            $scope.requests_table.todasLasSolicitudes = data;
            $scope.requests_table.solicitudes = data;
        });
        $scope.getCanceledRequest().then(function(data) {
            $scope.requests_table.solicitudesCanceladas = data;
            $scope.requests_table.canceladas = data;
        });
        $scope.getSendedRequest().then(function(data) {
            $scope.requests_table.solicitudesEnviadas = data;
            $scope.requests_table.enviadas = data;
        });
        $scope.getAceptedRequest().then(function(data) {
            $scope.requests_table.solicitudesAceptadas = data;
            $scope.requests_table.aceptadas = data;
        });
        $scope.getRejectedRequest().then(function(data) {
            $scope.requests_table.solicitudesRechazadas = data;
            $scope.requests_table.rechazadas = data;
        });
        $scope.getAutorizedRequest().then(function(data) {
            $scope.requests_table.solicitudesAutorizadas = data;
            $scope.requests_table.autorizadas = data;
        });
        
        /*getAllRequest();
        getCanceledRequest();
        getSendedRequest();
        getAceptedRequest();
        getRejectedRequest();
        getAutorizedRequest();*/
    }
    
    $scope.requests_table = [];
    
    $scope.requests_table.tamanioTablaTodasLasSolicitudes = 10;
    $scope.requests_table.todasLasSolicitudes = [];
    
    $scope.requests_table.tamanioTablaSolicitudesCanceladas = 10;
    $scope.requests_table.solicitudesCanceladas = [];
      
    $scope.requests_table.tamanioTablaSolicitudesEnviadas = 10;
    $scope.requests_table.solicitudesEnviadas = [];
      
    $scope.requests_table.tamanioTablaSolicitudesAceptadas = 10;
    $scope.requests_table.solicitudesAceptadas = [];
      
    $scope.requests_table.tamanioTablaSolicitudesRechazadas = 10;
    $scope.requests_table.solicitudesRechazadas = [];
    
    $scope.requests_table.tamanioTablaSolicitudesAutorizadas = 10;
    $scope.requests_table.solicitudesAutorizadas = [];
      
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
      
    $scope.showRequest = function (id){
        
        $http.get("admin-theme/modules/request/get_request/"+id).then(function (response) {
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
            
            $scope.formRequest.requestStatus = true;
            
            
            $scope.refreshTables();
            $state.go('vacaciones.detalle_autorizar');
        });
        
    }

/*--------------------------------------------------------------------------------------------------*/
      
      
/* Show formRequest Recived ------------------------------------------------------------------------------------*/
    
    $scope.formRequest={};
    
    $scope.getComprobante = function(){
        
        getAlert('theme/modules/absence/comprobante_medico/'+$scope.formRequest.inputRequestId);
    }
      
    $scope.rejectRequest = function() {
        
        $scope.formRequest.requestStatus = false;
        
    };
      
    $scope.cancelRejectRequest = function() {

        $scope.formRequest.requestStatus = true;
        
    };
      
    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
      
    $scope.authRequest = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/request/auth_request/"+$scope.formRequest.inputRequestId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("vacaciones.toda_las_solicitudes");
            getAlert('theme/success_modal/Solicitud aprobada correctamente');
        });
        
    };
   
    $scope.sendRejectRequest = function (){
        
        console.log("Enviando solicitud...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("r_id", $scope.formRequest.inputRequestId); 
        formData.append("r_motivo_cancelacion", document.getElementById("inputRequestMotivoCancelacion").value); 
        
        $http.post('admin-theme/modules/request/reject_request', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            resetForm("vacaciones.toda_las_solicitudes");
            $scope.sending = false;
            getAlert('theme/success_modal/Solicitud rechazada correctamente');
            
        })
        .error(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al rechazar la solicitud');
        });
        
    }
    
    $scope.cancelRequest = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/request/cancel_request/"+$scope.formRequest.inputRequestId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("vacaciones.toda_las_solicitudes");
            getAlert('theme/success_modal/Solicitud cancelada correctamente');
        });
        
    }
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Request Form ------------------------------------------------------------------------------------*/
    
    
    $scope.sending = false;
    
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

/*--------------------------------------------------------------------------------------------------*/
  }
    
})();