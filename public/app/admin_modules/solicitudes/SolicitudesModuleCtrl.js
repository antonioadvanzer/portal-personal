/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.solicitudes')
      .controller('SolicitudesModuleCtrl', SolicitudesModuleCtrl);

  /** @ngInject */
  function SolicitudesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
    //var vm = this;
      
/* Solicitudes table -------------------------------------------------------------------------------*/
      
    $scope.getAllRequest = function(){
        return $http.get("admin-theme/modules/request/get_all_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getCanceledRequest = function(){
        return $http.get("admin-theme/modules/request/get_canceled_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getSendedRequest = function(){
        return $http.get("admin-theme/modules/request/get_sended_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getAceptedRequest = function(){
        return $http.get("admin-theme/modules/request/get_acepted_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getRejectedRequest = function(){
        return $http.get("admin-theme/modules/request/get_rejected_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getAutorizedRequest = function(){
        return $http.get("admin-theme/modules/request/get_authorized_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.refreshTables = function(){
        $scope.getAllRequest().then(function(data) {
            $scope.todasLasSolicitudes = data;
        });
        $scope.getCanceledRequest().then(function(data) {
            $scope.solicitudesCanceladas = data;
        });
        $scope.getSendedRequest().then(function(data) {
            $scope.solicitudesEnviadas = data;
        });
        $scope.getAceptedRequest().then(function(data) {
            $scope.solicitudesAceptadas = data;
        });
        $scope.getRejectedRequest().then(function(data) {
            $scope.solicitudesRechazadas = data;
        });
        $scope.getAutorizedRequest().then(function(data) {
            $scope.solicitudesAutorizadas = data;
        });
    }
    
    $scope.tamanioTablaTodasLasSolicitudes = 10;
    $scope.todasLasSolicitudes = [];
    
    $scope.tamanioTablaSolicitudesCanceladas = 10;
    $scope.solicitudesCanceladas = [];
      
    $scope.tamanioTablaSolicitudesEnviadas = 10;
    $scope.solicitudesEnviadas = [];
      
    $scope.tamanioTablaSolicitudesAceptadas = 10;
    $scope.solicitudesAceptadas = [];
      
    $scope.tamanioTablaSolicitudesRechazadas = 10;
    $scope.solicitudesRechazadas = [];
    
    $scope.tamanioTablaSolicitudesAutorizadas = 10;
    $scope.solicitudesAutorizadas = [];
      
    $scope.refreshTables();
    
      
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
            $state.go('solicitudes.detalle_autorizar');
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
            resetForm("solicitudes.toda_las_solicitudes");
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
            resetForm("solicitudes.toda_las_solicitudes");
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
            resetForm("solicitudes.toda_las_solicitudes");
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