/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  //angular.module('PortalPersonal.modules.vacaciones')
    angular.module('PortalPersonal.modules.services')
      .controller('VacacionesModuleCtrl', VacacionesModuleCtrl);

  /** @ngInject */
  function VacacionesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {

    //var vm = this;

/* Solicitudes table -------------------------------------------------------------------------------*/
    
    $scope.getOwnRequests = function(){
        return $http.get("theme/modules/vacations/get_own_requests").then(function (response) {
            return response.data;
        });
    }
      
    $scope.getRequestsReceived = function(){
        return $http.get("theme/modules/vacations/get_requests_received").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getTotalDays = function(){
        return $http.get("theme/modules/vacations/get_total_days").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getDaysToExpire = function(){
        return $http.get("theme/modules/vacations/get_days_to_expire").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.getDaysInRequest = function(){
        return $http.get("theme/modules/vacations/get_days_in_requests").then(function (response) {
            return response.data;
        });  
    }
    
    $scope.refreshTables = function(){
        
        $scope.solicitudesPropias_loaded = false;
        $scope.solicitudesRecibidas_loaded = false;
        
        // function to get request
        $scope.getOwnRequests().then(function(data) {
            $scope.vacations_table.solicitudesPropias = data;
            $scope.vacations_table.propias = data;
            $scope.solicitudesPropias_loaded = true;
        });
        
        $scope.getRequestsReceived().then(function(data) {
            $scope.vacations_table.solicitudesRecibidas = data;
            $scope.vacations_table.recibidas = data;
            $scope.solicitudesRecibidas_loaded = true;
        });
        
        /*if(!$.fn.DataTable.isDataTable('#solicitudesRealizadasVacaciones')) {
            
            $('#solicitudesRealizadasVacaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
            table.destroy();
            $('#solicitudesRealizadasVacaciones').empty();
        }*/
        
        /*if(!$.fn.DataTable.isDataTable('#solicitudesRecibidasVacaciones')){
            $('#solicitudesRecibidasVacaciones').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
            table.destroy();
            $('#solicitudesRecibidasVacaciones').empty()
        }*/
        
        $scope.getTotalDays().then(function(data) {
            $scope.diasDisponibles = data;
            //$scope.standardSelectDays = getDaysList(data);
        });
        
        $scope.getDaysToExpire().then(function(data) {
            $scope.days_expire = data.dias;
            $scope.date_expire = data.fecha;
            
            $scope.getDaysInRequest().then(function(data) {
                $scope.diasDeSolicitud = data;
                calculateTotalDays();
                $scope.standardSelectDays = getDaysList($scope.diasDisponibles);
            });
        });
        
    }
    
    $scope.vacations_table = {};
      
      $scope.solicitudesPropias_loaded = false;
      $scope.solicitudesRecibidas_loaded = false;
    
    $scope.vacations_table.tamanioTablaSolicitudesRealizadas = 10;
      
    $scope.vacations_table.tamanioTablaSolicitudesRecibidas = 10;
    
    $scope.vacations_table.solicitudesPropias = [];
    
    $scope.vacations_table.solicitudesRecibidas = [];
      
    $scope.diasDisponibles = 0;
      
    $scope.days_expire = " ";
    $scope.date_expire = " ";
      
    $scope.diasDeSolicitud = 0;
    
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
      
    function getDaysList(days) {
        // set days available for request
        var days = [];

        for(var i = 1;i <= $scope.diasDisponibles;i++){
            days.push({dias: i, days: i});
        }
        
        return days;
    }
     
    function calculateTotalDays() {
        
        //$scope.diasDeSolicitud = 0;
        $scope.diasDisponibles -= $scope.diasDeSolicitud;
        
        if($scope.diasDeSolicitud >= $scope.days_expire){
            $scope.days_expire = " ";
            $scope.date_expire = " ";
        }else{
            $scope.days_expire -= $scope.diasDeSolicitud; 
        }
        
    }
      
    $scope.showOwnRequest = function (id){
        
        $http.get("theme/modules/vacations/get_own_request/"+id).then(function (response) {
          
            $scope.formOwnRequest.inputOwnRequestId = response.data.id;
            $scope.formOwnRequest.inputOwnRequestColaborador = response.data.colaborador;
            $scope.formOwnRequest.inputOwnRequestAutorizador = response.data.autorizador;
            $scope.formOwnRequest.inputOwnRequestDias = response.data.dias;
            $scope.formOwnRequest.inputOwnRequestEstado = response.data.estado;
            $scope.formOwnRequest.inputOwnRequestMotivo = response.data.motivo;
            $scope.formOwnRequest.inputOwnRequestDesde = response.data.desde;
            $scope.formOwnRequest.inputOwnRequestHasta = response.data.hasta;
            $scope.formOwnRequest.inputOwnRequestRegresa = response.data.regresa;
            $scope.formOwnRequest.inputOwnRequestObservaciones = response.data.observaciones;
            $scope.formOwnRequest.inputOwnRequestAuthBoss = response.data.aut_jefe;
            $scope.formOwnRequest.inputOwnRequestAuthCh = response.data.aut_ch;
            
            $scope.formOwnRequest.inputOwnRequestMotivoCancelacion = response.data.razon_cancelacion;
            $scope.formOwnRequest.inputOwnRequestOcacion = response.data.ocacion;
            $scope.formOwnRequest.inputOwnRequestStatus = response.data.status;
            
            //getOwnRequest();
            $scope.refreshTables();
            //$state.go('vacaciones.detalle_solicitud');
            //$state.go('servicios.detalle_solicitud_vacaciones');
            resetForm('servicios.detalle_solicitud_de_vacaciones_enviada');
        });
        
    }
      
    $scope.showRequestReceived = function (id){
        
        $http.get("theme/modules/vacations/get_request_received/"+id).then(function (response) {
          //console.log(response.data);
            $scope.formRequestReceived.inputRequestReceivedId = response.data.id;
            $scope.formRequestReceived.inputRequestReceivedColaborador = response.data.colaborador;
            $scope.formRequestReceived.inputRequestReceivedAutorizador = response.data.autorizador;
            $scope.formRequestReceived.inputRequestReceivedDias = response.data.dias;
            $scope.formRequestReceived.inputRequestReceivedEstado = response.data.estado;
            $scope.formRequestReceived.inputRequestReceivedMotivo = response.data.motivo;
            $scope.formRequestReceived.inputRequestReceivedDesde = response.data.desde;
            $scope.formRequestReceived.inputRequestReceivedHasta = response.data.hasta;
            $scope.formRequestReceived.inputRequestReceivedRegresa = response.data.regresa;
            $scope.formRequestReceived.inputRequestReceivedObservaciones = response.data.observaciones;
            $scope.formRequestReceived.inputRequestReceivedAuthBoss = response.data.aut_jefe;
            $scope.formRequestReceived.inputRequestReceivedAuthCh = response.data.aut_ch;
            
            $scope.formRequestReceived.inputRequestReceivedMotivoCancelacion = "";
            $scope.formRequestReceived.inputRequestReceivedOcacion = response.data.ocacion;
            $scope.formRequestReceived.inputRequestReceivedStatus = response.data.status;
            
            //getRequestReceived();
            $scope.refreshTables();
            //$state.go('vacaciones.detalle_autorizar');
            //$state.go('servicios.detalle_autorizar_vacaciones');
            resetForm("servicios.detalle_solicitud_de_vacaciones_recibida");
        });
        
        //$state.go('permisos_de_ausencia.detalle_autorizar', {id_absence_received: id});
        
    }
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Show Own Vacations Request ------------------------------------------------------------------------------------*/
    
    /*$scope.formOwnRequest={};
    $scope.formOwnRequest.inputOwnRequestId = "";
    $scope.formOwnRequest.inputOwnRequestColaborador = "";
    $scope.formOwnRequest.inputOwnRequestAutorizador = "";
    $scope.formOwnRequest.inputOwnRequestDias = "";
    $scope.formOwnRequest.inputOwnRequestEstado = "";
    $scope.formOwnRequest.inputOwnRequestMotivo = "";
    $scope.formOwnRequest.inputOwnRequestDesde = "";
    $scope.formOwnRequest.inputOwnRequestHasta = "";
    $scope.formOwnRequest.inputOwnRequestRegresa = "";
    $scope.formOwnRequest.inputOwnRequestObservaciones = "";
    $scope.formOwnRequest.inputOwnRequestAuthBoss = "";
    $scope.formOwnRequest.inputOwnRequestAuthCh = "";
    $scope.formOwnRequest.inputOwnRequestMotivoCancelacion = "";*/
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Show Vacations Request Recived ------------------------------------------------------------------------------------*/
    
    /*$scope.formRequestReceived={};
    $scope.formRequestReceived.inputRequestReceivedId = "";
    $scope.formRequestReceived.inputRequestReceivedColaborador = "";
    $scope.formRequestReceived.inputRequestReceivedAutorizador = "";
    $scope.formRequestReceived.inputRequestReceivedDias = "";
    $scope.formRequestReceived.inputRequestReceivedMotivo = "";
    $scope.formRequestReceived.inputRequestReceivedDesde = "";
    $scope.formRequestReceived.inputRequestReceivedHasta = "";
    $scope.formRequestReceived.inputRequestReceivedRegresa = "";
    $scope.formRequestReceived.inputRequestReceivedObservaciones = "";  
    $scope.formRequestReceived.inputRequestReceivedMotivoCancelacion = "";*/
      
    $scope.rejectRequest = function() {
        
        $scope.formRequestReceived.inputRequestReceivedStatus = 4;
        
    };
      
    $scope.cancelRejectRequest = function() {

        $scope.formRequestReceived.inputRequestReceivedStatus = 2;
        
    };
      
    $scope.acceptRequest = function (){
        
        $scope.sending = true;
        
        $http.get("theme/modules/vacations/accept_request/"+$scope.formRequestReceived.inputRequestReceivedId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            //resetForm("vacaciones.solicitudes");
            getAlert('theme/success_modal/Solicitud aceptada correctamente');
            $scope.getSolicitudeRecibidas();
        });
        
    };
      
    $scope.sendRejectRequest = function (){
        
        console.log("Enviando solicitud...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("vr_id", $scope.formRequestReceived.inputRequestReceivedId); 
        formData.append("vr_motivo_cancelacion", document.getElementById("inputRequestReceivedMotivoCancelacion").value); 
        
        $http.post('theme/modules/vacations/reject_request', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            //resetForm("vacaciones.solicitudes");
            $scope.sending = false;
            
            getAlert('theme/success_modal/Solicitud rechazada correctamente');
            
            $scope.getSolicitudeRecibidas();
            
        })
        .error(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al rechazar la solicitud');
        });
        
    };
      
/*--------------------------------------------------------------------------------------------------*/
    
/* New Absence Form ------------------------------------------------------------------------------------*/
    
    $scope.formRequest={};
      
    //$scope.disabled = undefined;
      
    $scope.dt = new Date();
    
    //$scope.dt = undefined;
    $scope.open = open;
    $scope.opened = false;
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy','yyyy-MM-dd' ,'shortDate'];
    $scope.format = $scope.formats[3];
    $scope.options = {
        dateDisabled: disabled,
        showWeeks: false
    };

    $scope.formRequest.inputRequestFechaFin = dateFormat(new Date());

    function open() {
        $scope.opened = true;
    }
    
    function disabled(data) {
        var date = data.date,
        mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
    }
      
    function dateFormat(today){
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
        dd='0'+dd
        } 

        if(mm<10) {
        mm='0'+mm
        } 

        today = mm+'/'+dd+'/'+yyyy;
        
        return today;
    }
      
    $scope.selectedBoss = {};
    $scope.standardBoss = {};
    $scope.standardSelectBosses = [
        {id:0, name:"Cargado Datos ..."}
    ];
      
    $http.get("theme/modules/user/get_bosses").then(function (response) {
      $scope.standardSelectBosses = response.data;
    });
      
    $scope.selectedDays = {};
    $scope.standardSelectDays = [
        {id:0, name:"Cargado Datos ..."}
    ];
      
    /*$http.get("theme/modules/vacations/get_days_available").then(function (response) {
      $scope.standardSelectDays = response.data;
    });*/
      
    $scope.setDays = function (item, model){
        
        $scope.formRequest.inputRequestDiasSolicitar = model.dias;
        document.getElementById("inputRequestDiasSolicitar").value = model.dias;
        setDate();
    };
    
    $scope.setDate = setDate;
        
    function setDate(){
        
        //var cant_dias = $scope.formRequest.inputRequestDiasSolicitar;
        var cant_dias = document.getElementById("inputRequestDiasSolicitar").value;
        
        var fecha_cal = sumaFecha(cant_dias, document.getElementById("inputRequestFechaInicio").value);
        document.getElementById("inputRequestFechaFin").value = fecha_cal;
        
        var fecha_ret = sumaFecha(2, document.getElementById("inputRequestFechaFin").value);
        document.getElementById("inputRequestFechaRetorno").value = fecha_ret;
        
        $scope.formRequest.inputRequestFechaFin = fecha_cal;
        $scope.formRequest.inputRequestFechaRegreso = fecha_ret;
        
        //console.log($scope.formAbsence.inputAbsenceFechaFin);
    }

    function sumaFecha(d, fecha){
        var Fecha = new Date();
        //var sFecha = fecha || (Fecha.getFullYear() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getDate());
        var sFecha = fecha || (Fecha.getFullYear() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getDate());
        var aFecha = sFecha.split('-');
        //var aFecha = sFecha.split('/');
        var fecha = aFecha[0]+'-'+aFecha[1]+'-'+aFecha[2];
        fecha= new Date(fecha);
        var i=0;
        while(i < parseInt(d)){
            fecha.setTime(fecha.getTime()+24*60*60*1000);
            if(fecha.getDay() != 6 && fecha.getDay() != 0)
                i++;
        }
        //fecha.setDate(fecha.getDate()+parseInt(d));
        var anno=fecha.getFullYear();
        var mes= fecha.getMonth()+1;
        var dia= fecha.getDate();
        mes = (mes < 10) ? ("0" + mes) : mes;
        dia = (dia < 10) ? ("0" + dia) : dia;
        var fechaFinal = anno+'-'+mes+'-'+dia;
        return (fechaFinal);
    }
    
    $scope.sending = false;
      
    $scope.save = function (){
        
        console.log("Enviando datos..."); 
        
        $scope.sending = true;
        
        var formData = new FormData();
        var days = 0;
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("vr_boss", $scope.selectedBoss.selected.id); 
        formData.append("vr_days", document.getElementById("inputRequestDiasSolicitar").value);
        
        formData.append("vr_date_start", document.getElementById("inputRequestFechaInicio").value); 
        formData.append("vr_date_end", document.getElementById("inputRequestFechaFin").value);
        formData.append("vr_date_return", document.getElementById("inputRequestFechaRetorno").value);
        
        formData.append("vr_observations", document.getElementById("inputRequestObservations").value); 
        
        $http.post('theme/modules/vacations/store_new_request', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/success_modal/Solicitud enviada correctamente');
            //resetForm("vacaciones.solicitar");
            //resetForm("servicios.vacaciones");
            $scope.getSolicitudesRealizadas();
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla el enviar la solicitud');
        });
    };
      
/*--------------------------------------------------------------------------------------------------*/
      
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
      
    $scope.getForm = function() {
        resetForm("servicios.solicitar_vacaciones");
    };
      
    $scope.getSolicitudesRealizadas = function() {
        resetForm("servicios.solicitudes_de_vacaciones_realizadas");
    };
      
    $scope.getSolicitudeRecibidas = function() {
        resetForm("servicios.solicitudes_de_vacaciones_recibidas");
    };
      
/*--------------------------------------------------------------------------------------------------*/	
  }

})();