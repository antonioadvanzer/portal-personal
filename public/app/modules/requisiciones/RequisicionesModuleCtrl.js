/**
 * @author Antonio Baez
 * created on 16.08.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.requisiciones')
      .controller('RequisicionesModuleCtrl', RequisicionesModuleCtrl);

  /** @ngInject */
  function RequisicionesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
      
      var vm = this;
  
  /* Solicitudes table -------------------------------------------------------------------------------*/
      $scope.getOwnRequest = function(){
        return $http.get("theme/modules/requisition/get_own_requests").then(function (response) {
            return response.data;
        });
      }
      
      $scope.getRequestReceived = function(){
        return $http.get("theme/modules/requisition/get_requests_received").then(function (response) {
            return response.data;
        });  
    }
      
      $scope.refreshTables = function(){
          // function to get request
        $scope.getOwnRequest().then(function(data) {
            $scope.requisitions_table.solicitudesPropias = data;
            $scope.requisitions_table.propias = data;
        });
        $scope.getRequestReceived().then(function(data) {
            $scope.requisitions_table.solicitudesRecibidas = data;
            $scope.requisitions_table.recibidas = data;
        });
      }
      
        $scope.requisitions_table = {};

        $scope.requisitions_table.tamanioTablaSolicitudesRealizadas = 10;

        $scope.requisitions_table.tamanioTablaSolicitudesRecibidas = 10;

        $scope.requisitions_table.solicitudesPropias = [];

        $scope.requisitions_table.solicitudesRecibidas = [];

        $scope.refreshTables();
      
      $scope.showOwnRequisition = function (id){
        
        $http.get("theme/modules/requisition/get_own_request/"+id).then(function (response) { 
             
            $scope.formOwnRequisition.inputOwnRequisitionId = response.data.id;
            $scope.formOwnRequisition.inputOwnRequisitionColaborador = response.data.colaborador;
            $scope.formOwnRequisition.inputOwnRequisitionDirector = response.data.director;
            $scope.formOwnRequisition.inputOwnRequisitionAutorizador = response.data.autorizador;
            $scope.formOwnRequisition.inputOwnRequisitionFechaSolicitud = response.data.fecha_solicitud;
            $scope.formOwnRequisition.inputOwnRequisitionFechaIngreso = response.data.fecha_ingreso;
            $scope.formOwnRequisition.inputOwnRequisitionArea = response.data.area;
            $scope.formOwnRequisition.inputOwnRequisitionTrack = response.data.track;
            $scope.formOwnRequisition.inputOwnRequisitionPosicion = response.data.posicion;
            $scope.formOwnRequisition.inputOwnRequisitionEmpresa = response.data.empresa;
            $scope.formOwnRequisition.inputOwnRequisitionTipoPosicion = response.data.tipo_posicion;
            $scope.formOwnRequisition.inputOwnRequisitionSustituyeA = response.data.sustituye_a;
            $scope.formOwnRequisition.inputOwnRequisitionCostoMaximo = response.data.costo_maximo;
            $scope.formOwnRequisition.inputOwnRequisitionProyecto = response.data.proyecto;
            $scope.formOwnRequisition.inputOwnRequisitionClaveProyecto = response.data.clave_proyecto;
            $scope.formOwnRequisition.inputOwnRequisitionRecidencia = response.data.residencia;
            $scope.formOwnRequisition.inputOwnRequisitionLugarTrabajo = response.data.lugar_trabajo;
            $scope.formOwnRequisition.inputOwnRequisitionDomicilioCliente = response.data.domicilio_cliente;
            $scope.formOwnRequisition.inputOwnRequisitionContratacion = response.data.contratacion;
            $scope.formOwnRequisition.inputOwnRequisitionEvaluadorTecnico = response.data.evaluador_tecnico;
            $scope.formOwnRequisition.inputOwnRequisitionDisponibilidadViajar = response.data.disponiblidad_viajar;
            $scope.formOwnRequisition.inputOwnRequisitionEdadDe = response.data.edad_de;
            $scope.formOwnRequisition.inputOwnRequisitionA = response.data.a;
            $scope.formOwnRequisition.inputOwnRequisitionSexo = response.data.sexo;
            $scope.formOwnRequisition.inputOwnRequisitionNivelEstudios = response.data.nivel_estudios;
            $scope.formOwnRequisition.inputOwnRequisitionCarrera = response.data.carrera;
            $scope.formOwnRequisition.inputOwnRequisitionInglesOral = response.data.ingles_oral;
            $scope.formOwnRequisition.inputOwnRequisitionInglesLectura = response.data.ingles_lectura;
            $scope.formOwnRequisition.inputOwnRequisitionInglesEscritura = response.data.ingles_escritura;
            $scope.formOwnRequisition.inputOwnRequisitionExperiencia = response.data.experiencia;
            $scope.formOwnRequisition.inputOwnRequisitionCaracteristicas = response.data.caracteristicas;
            $scope.formOwnRequisition.inputOwnRequisitionFunciones = response.data.funciones;
            $scope.formOwnRequisition.inputOwnRequisitionObservaciones = response.data.observaciones;
            $scope.formOwnRequisition.inputOwnRequisitionRazonCancelacion = response.data.razon_cancelacion;
            $scope.formOwnRequisition.inputOwnRequisitionEstado = response.data.estado;
            $scope.formOwnRequisition.inputOwnRequisitionStatus = response.data.status;
            //console.log($scope.formOwnRequisition);
            $scope.refreshTables();
            
            resetForm('requisiciones.detalle_requisicion');
        });
        
    }
      
    $scope.showRequisitionReceived = function (id){
        
        $http.get("theme/modules/requisition/get_request_received/"+id).then(function (response) { 
             
            $scope.formRequisitionReceived.inputRequisitionId = response.data.id;
            $scope.formRequisitionReceived.inputRequisitionColaborador = response.data.colaborador;
            $scope.formRequisitionReceived.inputRequisitionDirector = response.data.director;
            $scope.formRequisitionReceived.inputRequisitionAutorizador = response.data.autorizador;
            $scope.formRequisitionReceived.inputRequisitionFechaSolicitud = response.data.fecha_solicitud;
            $scope.formRequisitionReceived.inputRequisitionFechaIngreso = response.data.fecha_ingreso;
            $scope.formRequisitionReceived.inputRequisitionArea = response.data.area;
            $scope.formRequisitionReceived.inputRequisitionTrack = response.data.track;
            $scope.formRequisitionReceived.inputRequisitionPosicion = response.data.posicion;
            $scope.formRequisitionReceived.inputRequisitionEmpresa = response.data.empresa;
            $scope.formRequisitionReceived.inputRequisitionTipoPosicion = response.data.tipo_posicion;
            $scope.formRequisitionReceived.inputRequisitionSustituyeA = response.data.sustituye_a;
            $scope.formRequisitionReceived.inputRequisitionCostoMaximo = response.data.costo_maximo;
            $scope.formRequisitionReceived.inputRequisitionProyecto = response.data.proyecto;
            $scope.formRequisitionReceived.inputRequisitionClaveProyecto = response.data.clave_proyecto;
            $scope.formRequisitionReceived.inputRequisitionRecidencia = response.data.residencia;
            $scope.formRequisitionReceived.inputRequisitionLugarTrabajo = response.data.lugar_trabajo;
            $scope.formRequisitionReceived.inputRequisitionDomicilioCliente = response.data.domicilio_cliente;
            $scope.formRequisitionReceived.inputRequisitionContratacion = response.data.contratacion;
            $scope.formRequisitionReceived.inputRequisitionEvaluadorTecnico = response.data.evaluador_tecnico;
            $scope.formRequisitionReceived.inputRequisitionDisponibilidadViajar = response.data.disponiblidad_viajar;
            $scope.formRequisitionReceived.inputRequisitionEdadDe = response.data.edad_de;
            $scope.formRequisitionReceived.inputRequisitionA = response.data.a;
            $scope.formRequisitionReceived.inputRequisitionSexo = response.data.sexo;
            $scope.formRequisitionReceived.inputRequisitionNivelEstudios = response.data.nivel_estudios;
            $scope.formRequisitionReceived.inputRequisitionCarrera = response.data.carrera;
            $scope.formRequisitionReceived.inputRequisitionInglesOral = response.data.ingles_oral;
            $scope.formRequisitionReceived.inputRequisitionInglesLectura = response.data.ingles_lectura;
            $scope.formRequisitionReceived.inputRequisitionInglesEscritura = response.data.ingles_escritura;
            $scope.formRequisitionReceived.inputRequisitionExperiencia = response.data.experiencia;
            $scope.formRequisitionReceived.inputRequisitionCaracteristicas = response.data.caracteristicas;
            $scope.formRequisitionReceived.inputRequisitionFunciones = response.data.funciones;
            $scope.formRequisitionReceived.inputRequisitionObservaciones = response.data.observaciones;
            $scope.formRequisitionReceived.inputRequisitionEstado = response.data.estado;
            $scope.formRequisitionReceived.inputRequisitionStatus = response.data.status;
            $scope.formRequisitionReceived.inputRequisitionReceivedCancel = false;
            
            if(response.data.req_director == response.data.req_autorizador){
                $scope.formRequisitionReceived.inputRequisitionStatus = 3;
            }else{
                $scope.formRequisitionReceived.inputRequisitionStatus = response.data.status;
            }
            
            $scope.refreshTables();
            
            resetForm('requisiciones.detalle_autorizar');
        });
        
    }
      
  /*--------------------------------------------------------------------------------------------------*/
  
  /* Show Own Requisition ------------------------------------------------------------------------------------*/
    
      $scope.formOwnRequisition = {};
      $scope.formOwnRequisition.inputOwnRequisitionColaborador = "";
      $scope.formOwnRequisition.inputOwnRequisitionDirector = "";
      $scope.formOwnRequisition.inputOwnRequisitionAutorizador = "";
      $scope.formOwnRequisition.inputOwnRequisitionFechaSolicitud = "";
      $scope.formOwnRequisition.inputOwnRequisitionFechaIngreso = "";
      $scope.formOwnRequisition.inputOwnRequisitionArea = "";
      $scope.formOwnRequisition.inputOwnRequisitionTrack = "";
      $scope.formOwnRequisition.inputOwnRequisitionPosicion = "";
      $scope.formOwnRequisition.inputOwnRequisitionEmpresa = "";
      $scope.formOwnRequisition.inputOwnRequisitionTipoPosicion = "";
      $scope.formOwnRequisition.inputOwnRequisitionSustituyeA = "";
      $scope.formOwnRequisition.inputOwnRequisitionProyecto = "";
      $scope.formOwnRequisition.inputOwnRequisitionClaveProyecto = "";
      $scope.formOwnRequisition.inputOwnRequisitionCostoMaximo = "";
      $scope.formOwnRequisition.inputOwnRequisitionRecidencia = "";
      $scope.formOwnRequisition.inputOwnRequisitionLugarTrabajo = "";
      $scope.formOwnRequisition.inputOwnRequisitionDomicilioCliente = "";
      $scope.formOwnRequisition.inputOwnRequisitionContratacion = "";
      $scope.formOwnRequisition.inputOwnRequisitionEvaluadorTecnico = "";
      $scope.formOwnRequisition.inputOwnRequisitionDisponibilidadViajar = "";
      $scope.formOwnRequisition.inputOwnRequisitionEdadDe = "";
      $scope.formOwnRequisition.inputOwnRequisitionA = "";
      $scope.formOwnRequisition.inputOwnRequisitionSexo = "";
      $scope.formOwnRequisition.inputOwnRequisitionNivelEstudios = "";
      $scope.formOwnRequisition.inputOwnRequisitionCarrera = "";
      $scope.formOwnRequisition.inputOwnRequisitionInglesOral = "";
      $scope.formOwnRequisition.inputOwnRequisitionInglesLectura = "";
      $scope.formOwnRequisition.inputOwnRequisitionInglesEscritura = "";
      $scope.formOwnRequisition.inputRequisitionExperiencia = "";
      $scope.formOwnRequisition.inputRequisitionCaracteristicas = "";
      $scope.formOwnRequisition.inputRequisitionFunciones = "";
      $scope.formOwnRequisition.inputRequisitionObservaciones = "";
      
  /*--------------------------------------------------------------------------------------------------*/
  
  /* Show Absence Recived ------------------------------------------------------------------------------------*/
    
      $scope.formRequisitionReceived = {};
      
      $scope.rejectRequisition = function() {
        
        $scope.formRequisitionReceived.inputRequisitionReceivedCancel = true;
        
      };
      
      $scope.cancelRejectRequisition = function() {

        $scope.formRequisitionReceived.inputRequisitionReceivedCancel = false;
        
      };
      
      $scope.acceptRequisition = function (){
        
        $scope.sending = true;
        
        $http.get("theme/modules/requisition/accept_requisition/"+$scope.formRequisitionReceived.inputRequisitionId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            $scope.getSolicitudeRecibidas();
            getAlert('theme/success_modal/Solicitud aceptada correctamente');
        });
        
      };
      
      $scope.authRequisition = function (){
        
        $scope.sending = true;
        
        $http.get("theme/modules/requisition/auth_requisition/"+$scope.formRequisitionReceived.inputRequisitionId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            $scope.getSolicitudeRecibidas();
            getAlert('theme/success_modal/Solicitud autorizada correctamente');
        });
        
      };
      
    $scope.sendRejectRequisition = function (){
        
        console.log("Enviando solicitud...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("req_id", $scope.formRequisitionReceived.inputRequisitionId); 
        formData.append("req_motivo_cancelacion", document.getElementById("inputRequisitionReceivedMotivoCancelacion").value); 
        
        $http.post('theme/modules/requisition/reject_requisition', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            $scope.getSolicitudeRecibidas();
            getAlert('theme/success_modal/Requisicion rechazada correctamente');
        })
        .error(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al rechazar la requisicion');
        });
    };
      
  /*--------------------------------------------------------------------------------------------------*/
      
  /* New Requisition Form ------------------------------------------------------------------------------------*/

      $scope.formRequestRequisition = {};

      $scope.formRequestRequisition.fecha_solicitud = new Date();
      $scope.formRequestRequisition.sustituye_a = "";
      $scope.formRequestRequisition.proyecto = "";
      $scope.formRequestRequisition.clave_proyecto = "";
      $scope.formRequestRequisition.define_costo = "";
      $scope.formRequestRequisition.especifique_residencia = "";
      $scope.formRequestRequisition.domicilio_cliente = "";
      $scope.formRequestRequisition.evaluador_tecnico = "";
      $scope.formRequestRequisition.carrera = "";
      
        $scope.formRequestRequisition.dt = new Date();
        $scope.open = open;
        $scope.opened = false;
        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'yyyy-MM-dd', 'shortDate'];
        $scope.format = $scope.formats[3];
        $scope.options = {
            dateDisabled: disabled,
            showWeeks: false
        };

        function open() {
            $scope.opened = true;
        }

        function disabled(data) {
            var date = data.date,
            mode = data.mode;
            return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
        }
        
        $scope.disabled = undefined;
      
        $scope.selectedBoss = {};
        $scope.standardBoss = {};
        $scope.standardSelectBosses = [];
      
        $http.get("theme/modules/user/get_directors").then(function (response) {
            $scope.standardSelectBosses = response.data;
        });
      
        $scope.selectedAuthorizer = {};
        $scope.standardAuthorizer = {};
        //$scope.standardSelectAuthorizers = [];
        $scope.standardSelectAuthorizers = [
            {id:1, name: "MAURICIO CRUZ"},
            {id:2, name: "JULIO LUNA"},
            {id:51, name: "JOSE PERALTA"}
        ];
        
        /*$http.get("theme/modules/user/get_authorizers").then(function (response) {
            $scope.standardSelectAuthorizers = response.data;
        });*/
      
        $scope.selectedArea = {};
        $scope.standardArea = {};
        $scope.standardSelectAreas = [];
      
        $http.get("theme/modules/area/areas_activas").then(function (response) {
            $scope.standardSelectAreas = response.data;
        });
      
        $scope.selectedTrack = {};
        $scope.standardTrack = {};
        $scope.standardSelectTracks = [];
      
        $http.get("theme/modules/track/tracks_activos").then(function (response) {
            $scope.standardSelectTracks = response.data;
        });
        
        $scope.getPositions = function (item, model){
            $http.get("theme/modules/position/posiciones_activas_por_track/"+model.id).then(function (response) {
              $scope.standardSelectPositions = response.data;
            });
        };
      
        $scope.selectedPosition = {};
        $scope.standardPosition = {};
        $scope.standardSelectPositions = [];
      
        $scope.selectedCompany = {};
        $scope.standardCompany = {};
        $scope.standardSelectCompanies = [
            {id: 1, name: 'Advanzer'},
            {id: 2, name: 'Entuizer'}
        ];
      
        $scope.selectedType = {};
        $scope.standardType = {};
        $scope.standardSelectTypes = [
            {id: 1, name: 'Posición Nueva'},
            {id: 2, name: 'Sustitución'}
        ];
      
        $scope.selectedCosto = {};
        $scope.standardCosto = {};
        $scope.standardSelectCosto = [
            {id: 1, name: 'De Acuerdo al Tabulador'},
            {id: 2, name: 'Definir'}
        ];
      
        $scope.selectedResidencia = {};
        $scope.standardResidencia = {};
        $scope.standardSelectResidencia = [
            {id: 1, name: 'MTY'},
            {id: 2, name: 'CDMX'},
            {id: 3, name: 'Indistinto'},
            {id: 4, name: 'Otro'}
        ];
      
        $scope.selectedLugarTrabajo = {};
        $scope.standardLugarTrabajo = {};
        $scope.standardSelectLugarTrabajo = [
            {id: 1, name: 'Oficinas MTY-CDMX'},
            {id: 2, name: 'Oficinas del Cliente'},
            {id: 3, name: 'Ambos'}
        ];
      
        $scope.selectedContratacion = {};
        $scope.standardContratacion = {};
        $scope.standardSelectContratacion = [
            {id: 1, name: 'Indeterminado'},
            {id: 2, name: '3 Meses'},
            {id: 3, name: '6 Meses'},
            {id: 4, name: '9 Meses'},
            {id: 5, name: '12 Meses'},
            {id: 6, name: 'Duración del Proyecto'}
        ];
      
        $scope.selectedDisponibilidadViajar = {};
        $scope.standardDisponibilidadViajar = {};
        $scope.standardSelectDisponibilidadViajar = [
            {id: 1, name: 'Indistinto'},
            {id: 2, name: 'Si'},
            {id: 3, name: 'No'}
        ];
      
        $scope.selectedEdad1 = {};
        $scope.standardEdad1 = {};
        $scope.standardSelectEdad1 = [
            {id: 1, name: '20'},
            {id: 2, name: '21'},
            {id: 3, name: '22'},
            {id: 4, name: '23'},
            {id: 5, name: '24'},
            {id: 6, name: '25'},
            {id: 7, name: '26'},
            {id: 8, name: '27'},
            {id: 9, name: '28'},
            {id: 10, name: '29'},
            {id: 11, name: '30'},
            {id: 12, name: '31'},
            {id: 13, name: '32'},
            {id: 14, name: '33'},
            {id: 15, name: '34'},
            {id: 16, name: '35'},
            {id: 17, name: '36'},
            {id: 18, name: '37'},
            {id: 19, name: '38'},
            {id: 20, name: '39'},
            {id: 21, name: '40'},
            {id: 22, name: '41'},
            {id: 23, name: '42'},
            {id: 24, name: '43'},
            {id: 25, name: '44'},
            {id: 26, name: '45'},
            {id: 27, name: '46'},
            {id: 28, name: '47'},
            {id: 29, name: '48'},
            {id: 30, name: '49'},
            {id: 31, name: '50'},
            {id: 32, name: '51'},
            {id: 33, name: '52'},
            {id: 34, name: '53'},
            {id: 35, name: '54'},
            {id: 36, name: '55'},
            {id: 37, name: '56'},
            {id: 38, name: '57'},
            {id: 39, name: '58'},
            {id: 40, name: '59'},
            {id: 41, name: '60'}
        ];
      
        $scope.selectedEdad2 = {};
        $scope.standardEdad2 = {};
        $scope.standardSelectEdad2 = [
            {id: 1, name: '20'},
            {id: 2, name: '21'},
            {id: 3, name: '22'},
            {id: 4, name: '23'},
            {id: 5, name: '24'},
            {id: 6, name: '25'},
            {id: 7, name: '26'},
            {id: 8, name: '27'},
            {id: 9, name: '28'},
            {id: 10, name: '29'},
            {id: 11, name: '30'},
            {id: 12, name: '31'},
            {id: 13, name: '32'},
            {id: 14, name: '33'},
            {id: 15, name: '34'},
            {id: 16, name: '35'},
            {id: 17, name: '36'},
            {id: 18, name: '37'},
            {id: 19, name: '38'},
            {id: 20, name: '39'},
            {id: 21, name: '40'},
            {id: 22, name: '41'},
            {id: 23, name: '42'},
            {id: 24, name: '43'},
            {id: 25, name: '44'},
            {id: 26, name: '45'},
            {id: 27, name: '46'},
            {id: 28, name: '47'},
            {id: 29, name: '48'},
            {id: 30, name: '49'},
            {id: 31, name: '50'},
            {id: 32, name: '51'},
            {id: 33, name: '52'},
            {id: 34, name: '53'},
            {id: 35, name: '54'},
            {id: 36, name: '55'},
            {id: 37, name: '56'},
            {id: 38, name: '57'},
            {id: 39, name: '58'},
            {id: 40, name: '59'},
            {id: 41, name: '60'}
        ];
      
        $scope.selectedSexo = {};
        $scope.standardsexo = {};
        $scope.standardSelectSexo = [
            {id: 1, name: 'Indistinto'},
            {id: 2, name: 'Hombre'},
            {id: 3, name: 'Mujer'}
        ];
      
        $scope.selectedNivelEstudios = {};
        $scope.standardNivelEstudios = {};
        $scope.standardSelectNivelEstudios = [
            {id: 1, name: 'Practicante'},
            {id: 2, name: 'Pasante'},
            {id: 3, name: 'Técnico'},
            {id: 5, name: 'Licenciatura/Ingeniería'},
            {id: 6, name: 'Maestría'},
            {id: 7, name: 'Doctorado'}
        ];
      
        $scope.selectedInglesOral = {};
        $scope.standardInglesOral = {};
        $scope.standardSelectInglesOral = [
            {id: 1, name: 'Exelente'},
            {id: 2, name: 'Bueno'},
            {id: 3, name: 'Básico'}
        ];
      
        $scope.selectedInglesLectura = {};
        $scope.standardInglesLectura = {};
        $scope.standardSelectInglesLectura = [
            {id: 1, name: 'Exelente'},
            {id: 2, name: 'Bueno'},
            {id: 3, name: 'Básico'}
        ];
      
        $scope.selectedInglesEscritura = {};
        $scope.standardInglesEscritura = {};
        $scope.standardSelectInglesEscritura = [
            {id: 1, name: 'Exelente'},
            {id: 2, name: 'Bueno'},
            {id: 3, name: 'Básico'}
        ];
      
      $scope.sending = false;
      
      $scope.send = function (){

            console.log("Enviando datos...");

            $scope.sending = true;

            var formData = new FormData();

            formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            formData.append("req_boss", $scope.selectedBoss.selected.id);

            if(($scope.selectedBoss.selected.id == 1)|| ($scope.selectedBoss.selected.id == 2) || ($scope.selectedBoss.selected.id == 51)){
                formData.append("req_authorizer", $scope.selectedBoss.selected.id);
            }else{
                formData.append("req_authorizer", $scope.selectedAuthorizer.selected.id); 
            }

            formData.append("req_fecha_ingreso", document.getElementById("inputRequestFechaIngreso").value);
            formData.append("req_area", $scope.selectedArea.selected.id);
            formData.append("req_track", $scope.selectedTrack.selected.id);
            formData.append("req_posicion", $scope.selectedPosition.selected.id);
            formData.append("req_empresa", $scope.selectedCompany.selected.id);

            formData.append("req_tipo_posicion", $scope.selectedType.selected.name);

            if($scope.selectedType.selected.id == 2){
                formData.append("req_sustituye_a", $scope.formRequestRequisition.sustituye_a);
            }

            if($scope.selectedCosto.selected.id == 2){
                formData.append("req_costo_maximo", $scope.formRequestRequisition.define_costo);
            }else if($scope.selectedCosto.selected.id == 1){
                formData.append("req_costo_maximo", $scope.selectedCosto.selected.name);
            }
            
            formData.append("req_proyecto", $scope.formRequestRequisition.proyecto); 
            formData.append("req_clave_proyecto", $scope.formRequestRequisition.clave_proyecto); 

            if($scope.selectedResidencia.selected.id == 4){
                formData.append("req_residencia", $scope.formRequestRequisition.especifique_residencia);
            }else{
                formData.append("req_residencia", $scope.selectedResidencia.selected.name);
            }

            if($scope.selectedLugarTrabajo.selected.id == 3){
                formData.append("req_lugar_trabajo", $scope.selectedLugarTrabajo.selected.name);
                formData.append("req_domicilio_cliente", $scope.formRequestRequisition.domicilio_cliente);
            }else{
                formData.append("req_lugar_trabajo", $scope.selectedLugarTrabajo.selected.name);
            }

            formData.append("req_contratacion", $scope.selectedContratacion.selected.name);
            formData.append("req_evaluador_tecnico", $scope.formRequestRequisition.evaluador_tecnico);
            formData.append("req_disponiblidad_viajar", $scope.selectedDisponibilidadViajar.selected.name);
            formData.append("req_edad_uno", $scope.selectedEdad1.selected.name);
            formData.append("req_edad_dos", $scope.selectedEdad2.selected.name);
            formData.append("req_sexo", $scope.selectedSexo.selected.name);
            formData.append("req_nivel_estudios", $scope.selectedNivelEstudios.selected.name);
            formData.append("req_carrera", $scope.formRequestRequisition.carrera);
            formData.append("req_ingles_oral", $scope.selectedInglesOral.selected.name);
            formData.append("req_ingles_lectura", $scope.selectedInglesLectura.selected.name);
            formData.append("req_ingles_escritura", $scope.selectedInglesEscritura.selected.name);

            formData.append("req_conocimientos", document.getElementById("inputRequisitionExperiencia").value);
            formData.append("req_habilidades", document.getElementById("inputRequisitionCaracteristicas").value);
            formData.append("req_funciones", document.getElementById("inputRequisitionFunciones").value);
            formData.append("req_observaciones", document.getElementById("inputRequisitionObservaciones").value);

            //console.log(formData);
          
            $http.post('theme/modules/requisition/store_new_requisition', formData, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            })
            .success(function (response) {
                //alert('sent OK');
                console.log(response);
                $scope.sending = false;
                $scope.refreshTables();
                getAlert('theme/success_modal/Requisicion enviada correctamente');
                $scope.getSolicitudesRealizadas();

            })
            .error(function (response) {
                //alert('error sending.');
                console.log(response);
                $scope.sending = false;
                getAlert('theme/danger_modal/Falla el enviar la requisicion');
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
  /*------------------------------------------------------------------------------------------------------*/
  
  /*  ------------------------------------------------------------------------------------*/
      
      $scope.getSolicitudesRealizadas = function() {
        resetForm("requisiciones.requisiciones_realizadas");
    };
      
    $scope.getSolicitudeRecibidas = function() {
        resetForm("requisiciones.requisiciones_recibidas");
    };
      
  /*------------------------------------------------------------------------------------------------------*/
      
  }
    
})();