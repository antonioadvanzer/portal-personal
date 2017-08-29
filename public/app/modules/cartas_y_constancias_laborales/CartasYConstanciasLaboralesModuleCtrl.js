/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  //angular.module('PortalPersonal.modules.cartas_y_constancias_laborales')
    angular.module('PortalPersonal.modules.services')
      .controller('CartasYConstanciasLaboralesModuleCtrl', CartasYConstanciasLaboralesModuleCtrl);

  /** @ngInject */
  function CartasYConstanciasLaboralesModuleCtrl($scope, $http, $filter, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
/* Solicitudes table -------------------------------------------------------------------------------*/
    
    $scope.getRequestsLetter = function(){
        return $http.get("theme/modules/letter/get_requests_letter").then(function (response) {
            return response.data;
        });  
    }
      
    $scope.refreshTables = function(){
        // function to get request
        $scope.getRequestsLetter().then(function(data) {
            $scope.requests_table.solicitudesPropias = data;
        });
    }
    
    $scope.requests_table = {};
      
  	$scope.requests_table.tamanioTablaSolicitudes = 10;

    $scope.requests_table.solicitudesPropias = [];
      
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
    
    $('#solicitudesCartas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        destroy: true
    });
      
    $scope.showLetterDetail = function (id){

        $http.get("theme/modules/letter/get_letter_detail/"+id).then(function (response) {
            console.log(response.data);
            $scope.formLetterDetail.inputLetterDetailId = response.data.id;
            $scope.formLetterDetail.inputLetterDetailColaborador = response.data.colaborador;
            $scope.formLetterDetail.inputLetterDetailDirigidoA = response.data.dirigido;
            $scope.formLetterDetail.inputLetterDetailSueldo = response.data.sueldo;
            $scope.formLetterDetail.inputLetterDetailIMSS = response.data.imss;
            $scope.formLetterDetail.inputLetterDetailRFC = response.data.rfc;
            $scope.formLetterDetail.inputLetterDetailCURP = response.data.curp;
            $scope.formLetterDetail.inputLetterDetailAntiguedad = response.data.antiguedad;
            $scope.formLetterDetail.inputLetterDetailPuesto = response.data.puesto;
            $scope.formLetterDetail.inputLetterDetailDomicilio = response.data.domicilio;
            $scope.formLetterDetail.inputLetterDetailObservaciones = response.data.observaciones;

            $scope.refreshTables();
            //$state.go('cartas_y_constancias_laborales.detalle_carta');
            $state.go('servicios.detalle_carta');
        });

    }
      
/*--------------------------------------------------------------------------------------------------*/
      
/* Show Absence Recived ------------------------------------------------------------------------------------*/
      
    $scope.formLetterDetail={};
    $scope.formLetterDetail.inputLetterDetailId = "";
    $scope.formLetterDetail.inputLetterDetailDirigidoA = "";
    $scope.formLetterDetail.inputLetterDetailSueldo = "";
    $scope.formLetterDetail.inputLetterDetailIMSS = "";
    $scope.formLetterDetail.inputLetterDetailRFC = "";
    $scope.formLetterDetail.inputLetterDetailCURP = "";
    $scope.formLetterDetail.inputLetterDetailAntiguedad = "";
    $scope.formLetterDetail.inputLetterDetailPuesto = "";
    $scope.formLetterDetail.inputLetterDetailDomicilio = "";
    $scope.formLetterDetail.inputLetterDetailObservaciones = "";
      
      
    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
      
/*--------------------------------------------------------------------------------------------------*/
      
/* New Absence Form ------------------------------------------------------------------------------------*/
    
    $scope.formRequestLetter={};
    
    $scope.formRequestLetter.inputRequestLetterDirigidoA = "";
    $scope.formRequestLetter.inputRequestLetterSueldo = false;
    $scope.formRequestLetter.inputRequestLetterIMSS = false;
    $scope.formRequestLetter.inputRequestLetterRFC = false;
    $scope.formRequestLetter.inputRequestLetterCURP = false;
    $scope.formRequestLetter.inputRequestLetterAntiguedad = false;
    $scope.formRequestLetter.inputRequestLetterPuesto = false;
    $scope.formRequestLetter.inputRequestLetterDomicilio = false;
    $scope.formRequestLetter.inputRequestLetterObervaciones = " ";
      
      
    $scope.sending = false;
      
    $scope.save = function (){
        
        console.log("Enviando datos...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("rl_dirigido_a", $scope.formRequestLetter.inputRequestLetterDirigidoA); 
        formData.append("rl_sueldo", $scope.formRequestLetter.inputRequestLetterSueldo);
        formData.append("rl_imss", $scope.formRequestLetter.inputRequestLetterIMSS); 
        formData.append("rl_rfc", $scope.formRequestLetter.inputRequestLetterRFC);
        formData.append("rl_curp", $scope.formRequestLetter.inputRequestLetterCURP); 
        formData.append("rl_antiguedad", $scope.formRequestLetter.inputRequestLetterAntiguedad);
        formData.append("rl_puesto", $scope.formRequestLetter.inputRequestLetterPuesto); 
        formData.append("rl_domicilio", $scope.formRequestLetter.inputRequestLetterDomicilio);
        //formData.append("rl_observaciones", $scope.formRequestLetter.inputRequestLetterObervaciones);
        formData.append("rl_observaciones", document.getElementById("inputRequestLetterObervaciones").value);
        
        $http.post('theme/modules/letter/store_new_letter', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Solicitud enviada correctamente');
            resetForm("cartas_y_constancias_laborales.solicitar");
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla el enviar la solicitud');
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
      
/*--------------------------------------------------------------------------------------------------*/
      
    $scope.getForm = function() {
        resetForm("servicios.solicitar_carta");
    };
      
    $scope.getSolicitudes = function() {
        resetForm("servicios.solicitudes_de_cartas");
    }
/*--------------------------------------------------------------------------------------------------*/

  }

})();