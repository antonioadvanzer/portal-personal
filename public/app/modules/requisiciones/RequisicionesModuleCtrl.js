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
  
  /* New Requisition Form ------------------------------------------------------------------------------------*/

      $scope.formRequestRequisition={};

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
      
        $http.get("admin-theme/modules/user/get_directors").then(function (response) {
            $scope.standardSelectBosses = response.data;
        });
      
        $scope.selectedAuthorizer = {};
        $scope.standardAuthorizer = {};
        $scope.standardSelectAuthorizers = [];
      
        $http.get("admin-theme/modules/user/get_authorizers").then(function (response) {
            $scope.standardSelectAuthorizers = response.data;
        });
      
        $scope.selectedArea = {};
        $scope.standardArea = {};
        $scope.standardSelectAreas = [];
      
        $http.get("admin-theme/modules/area/areas_activas").then(function (response) {
            $scope.standardSelectAreas = response.data;
        });
      
        $scope.selectedTrack = {};
        $scope.standardTrack = {};
        $scope.standardSelectTracks = [];
      
        $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
            $scope.standardSelectTracks = response.data;
        });
        
        $scope.getPositions = function (item, model){
            $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+model.id).then(function (response) {
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
      
      $scope.save = function (){
          
      }
  /*--------------------------------------------------------------------------------------------------*/
      
  }
    
})();