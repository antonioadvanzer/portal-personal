/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.requisiciones')
      .controller('RequisicionesModuleCtrl', RequisicionesModuleCtrl);

  /** @ngInject */
  function RequisicionesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
    //var vm = this;
      
/* Solicitudes table -------------------------------------------------------------------------------*/
      
    $scope.getAllRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_all_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getCanceledRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_canceled_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getSendedRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_sended_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getAceptedRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_acepted_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getAuthorizedRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_authorized_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getRejectedRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_rejected_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getProcessingRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_processing_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getCompletedRequisition = function(){
        return $http.get("admin-theme/modules/requisition/get_completed_requisitions").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.goBack = function (){
        window.history.back();
    };
    
    $scope.refreshTables = function(){
        
        $scope.todasLasRequisiciones_loaded = false;
        $scope.requisicionesCanceladas_loaded = false;
        $scope.requisicionesEnviadas_loaded = false;
        $scope.requisicionesAceptadas_loaded = false;
        $scope.requisicionesAutorizadas_loaded = false;
        $scope.requisicionesRechazadas_loaded = false;
        $scope.requisicionesEnProceso_loaded = false;
        $scope.requisicionesCompletadas_loaded = false;
        
        $scope.getAllRequisition().then(function(data) {
            $scope.requisitions_table.todasLasRequisiciones = data;
            $scope.requisitions_table.requisiciones = data;
            $scope.todasLasRequisiciones_loaded = true;
        });
        $scope.getCanceledRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesCanceladas = data;
            $scope.requisitions_table.canceladas = data;
            $scope.requisicionesCanceladas_loaded = true;
        });
        $scope.getSendedRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesEnviadas = data;
            $scope.requisitions_table.enviadas = data;
            $scope.requisicionesEnviadas_loaded = true;
        });
        $scope.getAceptedRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesAceptadas = data;
            $scope.requisitions_table.aceptadas = data;
            $scope.requisicionesAceptadas_loaded = true;
        });
        $scope.getAuthorizedRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesAutorizadas = data;
            $scope.requisitions_table.autorizadas = data;
            $scope.requisicionesAutorizadas_loaded = true;
        });
        $scope.getRejectedRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesRechazadas = data;
            $scope.requisitions_table.rechazadas = data;
            $scope.requisicionesRechazadas_loaded = true;
        });
        $scope.getProcessingRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesEnProceso = data;
            $scope.requisitions_table.enproceso = data;
            $scope.requisicionesEnProceso_loaded = true;
        });
        $scope.getCompletedRequisition().then(function(data) {
            $scope.requisitions_table.requisicionesCompletadas = data;
            $scope.requisitions_table.completadas = data;
            $scope.requisicionesCompletadas_loaded = true;
        });
    }
    
    $scope.requisitions_table = [];
      
      $scope.todasLasRequisiciones_loaded = false;
      $scope.requisicionesCanceladas_loaded = false;
      $scope.requisicionesEnviadas_loaded = false;
      $scope.requisicionesAceptadas_loaded = false;
      $scope.requisicionesAutorizadas_loaded = false;
      $scope.requisicionesRechazadas_loaded = false;
      $scope.requisicionesEnProceso_loaded = false;
      $scope.requisicionesCompletadas_loaded = false;
    
    $scope.requisitions_table.tamanioTablaTodasLasRequisiciones = 10;
    $scope.requisitions_table.todasLasRequisiciones = [];
    
    $scope.requisitions_table.tamanioTablaRequisicionesCanceladas = 10;
    $scope.requisitions_table.requisicionesCanceladas = [];
      
    $scope.requisitions_table.tamanioTablaRequisicionesEnviadas = 10;
    $scope.requisitions_table.requisicionesEnviadas = [];
      
    $scope.requisitions_table.tamanioTablaRequisicionesAceptadas = 10;
    $scope.requisitions_table.requisicionesAceptadas = [];
    
    $scope.requisitions_table.tamanioTablaRequisicionesAutorizadas = 10;
    $scope.requisitions_table.requisicionesAutorizadas = [];
      
    $scope.requisitions_table.tamanioTablaRequisicionesRechazadas = 10;
    $scope.requisitions_table.requisicionesRechazadas = [];

    $scope.requisitions_table.tamanioTablaRequisicionesEnProceso = 10;
    $scope.requisitions_table.requisicionesEnProceso = [];

    $scope.requisitions_table.tamanioTablaRequisicionesCompletadas = 10;
    $scope.requisitions_table.requisicionesCompletadas = [];
      
    $scope.refreshTables();
      
    $scope.showRequisitionDetail = function (id){
        
        $http.get("admin-theme/modules/requisition/get_requisition/"+id).then(function (response) {
            //console.log(response.data);
            $scope.formRequisition.inputRequisitionId = response.data.id;
            $scope.formRequisition.inputRequisitionColaborador = response.data.colaborador;
            $scope.formRequisition.inputRequisitionDirector = response.data.director;
            $scope.formRequisition.inputRequisitionAutorizador = response.data.autorizador;
            $scope.formRequisition.inputRequisitionFechaSolicitud = response.data.fecha_solicitud;
            $scope.formRequisition.inputRequisitionFechaIngreso = response.data.fecha_ingreso;
            $scope.formRequisition.inputRequisitionArea = response.data.area;
            $scope.formRequisition.inputRequisitionTrack = response.data.track;
            $scope.formRequisition.inputRequisitionPosicion = response.data.posicion;
            $scope.formRequisition.inputRequisitionEmpresa = response.data.empresa;
            $scope.formRequisition.inputRequisitionTipoPosicion = response.data.tipo_posicion;
            $scope.formRequisition.inputRequisitionSustituyeA = response.data.sustituye_a;
            $scope.formRequisition.inputRequisitionCostoMaximo = response.data.costo_maximo;
            $scope.formRequisition.inputRequisitionProyecto = response.data.proyecto;
            $scope.formRequisition.inputRequisitionClaveProyecto = response.data.clave_proyecto;
            $scope.formRequisition.inputRequisitionRecidencia = response.data.residencia;
            $scope.formRequisition.inputRequisitionLugarTrabajo = response.data.lugar_trabajo;
            $scope.formRequisition.inputRequisitionDomicilioCliente = response.data.domicilio_cliente;
            $scope.formRequisition.inputRequisitionContratacion = response.data.contratacion;
            $scope.formRequisition.inputRequisitionEvaluadorTecnico = response.data.evaluador_tecnico;
            $scope.formRequisition.inputRequisitionDisponibilidadViajar = response.data.disponiblidad_viajar;
            $scope.formRequisition.inputRequisitionEdadDe = response.data.edad_de;
            $scope.formRequisition.inputRequisitionA = response.data.a;
            $scope.formRequisition.inputRequisitionSexo = response.data.sexo;
            $scope.formRequisition.inputRequisitionNivelEstudios = response.data.nivel_estudios;
            $scope.formRequisition.inputRequisitionCarrera = response.data.carrera;
            $scope.formRequisition.inputRequisitionInglesOral = response.data.ingles_oral;
            $scope.formRequisition.inputRequisitionInglesLectura = response.data.ingles_lectura;
            $scope.formRequisition.inputRequisitionInglesEscritura = response.data.ingles_escritura;
            $scope.formRequisition.inputRequisitionExperiencia = response.data.experiencia;
            $scope.formRequisition.inputRequisitionCaracteristicas = response.data.caracteristicas;
            $scope.formRequisition.inputRequisitionFunciones = response.data.funciones;
            $scope.formRequisition.inputRequisitionObservaciones = response.data.observaciones;
            $scope.formRequisition.inputRequisitionRazonCancelacion = response.data.razon_cancelacion;
            $scope.formRequisition.inputRequisitionEstado = response.data.estado;
            $scope.formRequisition.inputRequisitionStatus = response.data.status;
            
            $scope.formRequisition.requestStatus = true;
            
            $scope.refreshTables();
            $state.go('requisiciones.detalle_requisicion');
        });
        
    }

/*--------------------------------------------------------------------------------------------------*/
      
      
/* Show formRequisition Recived ------------------------------------------------------------------------------------*/
    
    $scope.formRequisition={};
      
    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
      
    $scope.processRequisition = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/requisition/process_requisition/"+$scope.formRequisition.inputRequisitionId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("requisiciones.toda_las_requisiciones");
            getAlert('theme/success_modal/Requisicion en Proceso');
        });
        
    };
      
    $scope.closeRequisition = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/requisition/complete_requisition/"+$scope.formRequisition.inputRequisitionId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("requisiciones.toda_las_requisiciones");
            getAlert('theme/success_modal/Requisicion Cerrada');
        });
        
    };
    
    $scope.cancelRequisition = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/requisition/cancel_requisition/"+$scope.formRequisition.inputRequisitionId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("requisiciones.toda_las_requisiciones");
            getAlert('theme/success_modal/Requisicion cancelada correctamente');
        });
        
    }
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Requisition Form ------------------------------------------------------------------------------------*/
    
    
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