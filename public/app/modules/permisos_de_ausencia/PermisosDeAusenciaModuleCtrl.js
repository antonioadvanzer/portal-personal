/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  //angular.module('PortalPersonal.modules.permisos_de_ausencia')
    angular.module('PortalPersonal.modules.services')
      .controller('PermisosDeAusenciaModuleCtrl', PermisosDeAusenciaModuleCtrl);

  /** @ngInject */
  function PermisosDeAusenciaModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
    //var vm = this;
      
/* Solicitudes table -------------------------------------------------------------------------------*/
     
    $scope.getOwnRequest = function(){
        return $http.get("theme/modules/absence/get_own_requests").then(function (response) {
          //$scope.solicitudesPropias = response.data;
            //$scope.absence.tamanioTablaSolicitudesRealizadas = 10;
            return response.data;
        });
    }
      
    $scope.getRequestReceived = function(){
        return $http.get("theme/modules/absence/get_requests_received").then(function (response) {
          //$scope.solicitudesRecibidas = response.data;
            //$scope.absence.tamanioTablaSolicitudesRecibidas = 10;
            return response.data;
        });  
    }
    
    $scope.refreshTables = function(){
        // function to get request
        $scope.getOwnRequest().then(function(data) {
            $scope.absences_table.solicitudesPropias = data;
        });
        $scope.getRequestReceived().then(function(data) {
            $scope.absences_table.solicitudesRecibidas = data;
        });
    }
    
    $scope.absences_table = {};
      
  	$scope.absences_table.tamanioTablaSolicitudesRealizadas = 10;
      
    $scope.absences_table.tamanioTablaSolicitudesRecibidas = 10;
      
    $scope.absences_table.solicitudesPropias = [];
      
    $scope.absences_table.solicitudesRecibidas = [];
    
    //$scope.refreshTables();
    $timeout(function() {
        $scope.refreshTables();
    }, 2000);
    
    $scope.showOwnAbsence = function (id){
        
        $http.get("theme/modules/absence/get_own_absence/"+id).then(function (response) {
          
            $scope.formOwnAbsence.inputOwnAbsenceId = response.data.id;
            $scope.formOwnAbsence.inputOwnAbsenceColaborador = response.data.colaborador;
            $scope.formOwnAbsence.inputOwnAbsenceAutorizador = response.data.autorizador;
            $scope.formOwnAbsence.inputOwnAbsenceDias = response.data.dias;
            $scope.formOwnAbsence.inputOwnAbsenceEstado = response.data.estado;
            $scope.formOwnAbsence.inputOwnAbsenceMotivo = response.data.motivo;
            $scope.formOwnAbsence.inputOwnAbsenceDesde = response.data.desde;
            $scope.formOwnAbsence.inputOwnAbsenceHasta = response.data.hasta;
            $scope.formOwnAbsence.inputOwnAbsenceRegresa = response.data.regresa;
            $scope.formOwnAbsence.inputOwnAbsenceObservaciones = response.data.observaciones;
            $scope.formOwnAbsence.inputOwnAbsenceAuthBoss = response.data.aut_jefe;
            $scope.formOwnAbsence.inputOwnAbsenceAuthCh = response.data.aut_ch;
            
            $scope.formOwnAbsence.inputOwnAbsenceMotivoCancelacion = response.data.razon_cancelacion;
            $scope.formOwnAbsence.inputOwnAbsenceOcacion = response.data.ocacion;
            $scope.formOwnAbsence.inputOwnAbsenceStatus = response.data.status;
            
            //getOwnRequest();
            $scope.refreshTables();
            //$state.go('permisos_de_ausencia.detalle_solicitud');
            $state.go('servicios.detalle_solicitud_permiso_de_ausencia');
        });
        
    }
      
    $scope.showAbsenceReceived = function (id){
        //$window.location.href = '#/permisos_de_ausencia/ver_recibida/'+id;
        //$location.path('#/permisos_de_ausencia/ver_recibida/'+id);
        
        $http.get("theme/modules/absence/get_absence_received/"+id).then(function (response) {
          //console.log(response.data);
            $scope.formAbsenceReceived.inputAbsenceReceivedId = response.data.id;
            $scope.formAbsenceReceived.inputAbsenceReceivedColaborador = response.data.colaborador;
            $scope.formAbsenceReceived.inputAbsenceReceivedAutorizador = response.data.autorizador;
            $scope.formAbsenceReceived.inputAbsenceReceivedDias = response.data.dias;
            $scope.formAbsenceReceived.inputAbsenceReceivedEstado = response.data.estado;
            $scope.formAbsenceReceived.inputAbsenceReceivedMotivo = response.data.motivo;
            $scope.formAbsenceReceived.inputAbsenceReceivedDesde = response.data.desde;
            $scope.formAbsenceReceived.inputAbsenceReceivedHasta = response.data.hasta;
            $scope.formAbsenceReceived.inputAbsenceReceivedRegresa = response.data.regresa;
            $scope.formAbsenceReceived.inputAbsenceReceivedObservaciones = response.data.observaciones;
            $scope.formAbsenceReceived.inputAbsenceReceivedAuthBoss = response.data.aut_jefe;
            $scope.formAbsenceReceived.inputAbsenceReceivedAuthCh = response.data.aut_ch;
            
            $scope.formAbsenceReceived.inputAbsenceReceivedMotivoCancelacion = "";
            $scope.formAbsenceReceived.inputAbsenceReceivedOcacion = response.data.ocacion;
            $scope.formAbsenceReceived.inputAbsenceReceivedStatus = response.data.status;
            
            //getRequestReceived();
            $scope.refreshTables();
            //$state.go('permisos_de_ausencia.detalle_autorizar');
            $state.go('servicios.detalle_autorizar_permiso_de_ausencia');
        });
        
        //$state.go('permisos_de_ausencia.detalle_autorizar', {id_absence_received: id});
        
    }

/*--------------------------------------------------------------------------------------------------*/
      
/* Show Own Absence ------------------------------------------------------------------------------------*/
    
    $scope.formOwnAbsence={};
    $scope.formOwnAbsence.inputOwnAbsenceId = "";
    $scope.formOwnAbsence.inputOwnAbsenceColaborador = "";
    $scope.formOwnAbsence.inputOwnAbsenceAutorizador = "";
    $scope.formOwnAbsence.inputOwnAbsenceDias = "";
    $scope.formOwnAbsence.inputOwnAbsenceEstado = "";
    $scope.formOwnAbsence.inputOwnAbsenceMotivo = "";
    $scope.formOwnAbsence.inputOwnAbsenceDesde = "";
    $scope.formOwnAbsence.inputOwnAbsenceHasta = "";
    $scope.formOwnAbsence.inputOwnAbsenceRegresa = "";
    $scope.formOwnAbsence.inputOwnAbsenceObservaciones = "";
    $scope.formOwnAbsence.inputOwnAbsenceAuthBoss = "";
    $scope.formOwnAbsence.inputOwnAbsenceAuthCh = "";
    $scope.formOwnAbsence.inputOwnAbsenceMotivoCancelacion = "";
      
    $scope.getRecibo = function(){
        getAlert('theme/modules/absence/comprobante_medico/'+$scope.formOwnAbsence.inputOwnAbsenceId);
    }
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Show Absence Recived ------------------------------------------------------------------------------------*/
    
    $scope.formAbsenceReceived={};
    $scope.formAbsenceReceived.inputAbsenceReceivedId = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedColaborador = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedAutorizador = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedDias = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedMotivo = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedDesde = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedHasta = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedRegresa = "";
    $scope.formAbsenceReceived.inputAbsenceReceivedObservaciones = "";  
    $scope.formAbsenceReceived.inputAbsenceReceivedMotivoCancelacion = "";
    
    $scope.getComprobante = function(){
        
        getAlert('theme/modules/absence/comprobante_medico/'+$scope.formAbsenceReceived.inputAbsenceReceivedId);
    }
      
    $scope.rejectAbsence = function() {
        
        $scope.formAbsenceReceived.inputAbsenceReceivedStatus = 4;
        
    };
      
    $scope.cancelRejectAbsence = function() {

        $scope.formAbsenceReceived.inputAbsenceReceivedStatus = 2;
        
    };
      
    $scope.acceptAbsence = function (){
        
        $scope.sending = true;
        
        $http.get("theme/modules/absence/accept_absence/"+$scope.formAbsenceReceived.inputAbsenceReceivedId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("permisos_de_ausencia.solicitudes");
            getAlert('theme/success_modal/Solicitud aceptada correctamente');
        });
        
    };
      
    $scope.sendRejectAbsence = function (){
        
        console.log("Enviando solicitud...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("abs_id", $scope.formAbsenceReceived.inputAbsenceReceivedId); 
        formData.append("abs_motivo_cancelacion", document.getElementById("inputAbsenceReceivedMotivoCancelacion").value); 
        
        $http.post('theme/modules/absence/reject_absence', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            //resetForm("permisos_de_ausencia.solicitudes");
            resetForm("servicios.solicitudes_de_permisos_de_ausencia");
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
      
/*--------------------------------------------------------------------------------------------------*/
      
/* New Absence Form ------------------------------------------------------------------------------------*/
    
    $scope.formAbsence={};
    
    //$scope.formAbsence.inputAbsenceComprobante = "";
    //$scope.formAbsence.inputAbsenceFechaFin = "";
    //$scope.formAbsence.inputAbsenceDiasSolicitar = 0;
      
    $scope.dt = new Date();
    
    //$scope.dt = undefined;
    $scope.open = open;
    $scope.opened = false;
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'yyyy-MM-dd', 'shortDate'];
    $scope.format = $scope.formats[3];
    $scope.options = {
        dateDisabled: disabled,
        showWeeks: false
    };

    $scope.formAbsence.inputAbsenceFechaFin = dateFormat(new Date());
      
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
    $scope.standardSelectBosses = [];
      
    $http.get("theme/modules/user/get_bosses").then(function (response) {
      $scope.standardSelectBosses = response.data;
    });
    
    $scope.selectedOcacion = {};
    $scope.standardOcacion = {};
    $scope.standardSelectOcacions = [];
      
    $http.get("theme/modules/absence/get_ocacions").then(function (response) {
      $scope.standardSelectOcacions = response.data;
    });
    
    $scope.setDays = function (item, model){
        
        $scope.formAbsence.inputAbsenceDiasSolicitar = parseInt(model.dias);
        setDate();
    };
    
    $scope.setDate = setDate;
        
    function setDate(){
        //alert(document.getElementById("inputAbsenceFechaInicio").value);
        //console.log($scope.selectedBoss.selected);
        
        //var cant_dias = $scope.formAbsence.inputAbsenceDiasSolicitar | document.getElementById("inputAbsenceDiasSolicitar").value; 
        var days_fi = $scope.formAbsence.inputAbsenceDiasSolicitar;
        var cant_dias = days_fi ? days_fi : document.getElementById("inputAbsenceDiasSolicitar").value;
        
        //alert($scope.formAbsence.inputAbsenceDiasSolicitar+" "+document.getElementById("inputAbsenceDiasSolicitar").value+" "+cant_dias);
        //var cant_dias = document.getElementById("inputAbsenceDiasSolicitar").value;
        //$scope.formAbsence.inputAbsenceFechaFin = sumaFecha(cant_dias, document.getElementById("inputAbsenceFechaInicio").value);
        var fecha_cal = sumaFecha(cant_dias, document.getElementById("inputAbsenceFechaInicio").value);
        document.getElementById("inputAbsenceFechaFin").value = fecha_cal;
        $scope.formAbsence.inputAbsenceFechaFin = fecha_cal;
        console.log($scope.formAbsence.inputAbsenceFechaFin);
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
        //alert("test");
        console.log("Enviando datos...");
        //console.log(document.getElementById("inputAbsenceComprobante").value?"a":"b");
        //console.log(document.getElementById("inputAbsenceComprobante").files[0]);
        
        //console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        $scope.sending = true;
        
        var formData = new FormData();
        var days = 0;
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    
        formData.append("abs_boss", $scope.selectedBoss.selected.id); 
        formData.append("abs_ocacion", $scope.selectedOcacion.selected.id); 
        
        formData.append("abs_required_auth", ($scope.selectedOcacion.selected.id == 8 || $scope.selectedOcacion.selected.id == 9 ? 1 : 0) );
        
        formData.append("abs_days", $scope.formAbsence.inputAbsenceDiasSolicitar | document.getElementById("inputAbsenceDiasSolicitar").value); 
        
        formData.append("abs_date_start", document.getElementById("inputAbsenceFechaInicio").value); 
        formData.append("abs_date_end", document.getElementById("inputAbsenceFechaFin").value); 
        
        formData.append("abs_date_return", sumaFecha(2, document.getElementById("inputAbsenceFechaFin").value)); 
        
        formData.append("abs_has_file", document.getElementById("inputAbsenceComprobante").files[0] ? "Y" : "N");
        
        if(document.getElementById("inputAbsenceComprobante").value){
            formData.append("abs_file", document.getElementById("inputAbsenceComprobante").files[0]);    
        }
        
        formData.append("abs_observations", document.getElementById("inputAbsenceObservations").value); 
        
        $http.post('theme/modules/absence/store_new_absence', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Solicitud enviada correctamente');
            //resetForm("permisos_de_ausencia.solicitar");
            resetForm("servicios.solicitudes_de_permisos_de_ausencia");
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al enviar la solicitud');
        });
        
        //console.log(formData);
        
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
      
    $scope.getForm = function() {
        resetForm("servicios.solicitar_permiso_de_ausencia");
    };
      
    $scope.getSolicitudes = function() {
        resetForm("servicios.solicitudes_de_permisos_de_ausencia");
    };
      
/*--------------------------------------------------------------------------------------------------*/
  }
    
})();