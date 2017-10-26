/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.evaluaciones')
      .controller('EvaluacionesModuleCtrl', EvaluacionesModuleCtrl);

  /** @ngInject */
  function EvaluacionesModuleCtrl($scope, $http , $filter, $window, $location, $state, $uibModal, $timeout, fileReader, editableOptions, editableThemes) {
      
      var vm = this;
      
  /* Evaluaciones table -------------------------------------------------------------------------------*/
      
      /*$scope.getEvaluaciones = function(year){
        return $http.get("admin-theme/modules/evaluation/list_results_evaluations/"+year).then(function (response) {
            return response.data;
        });
      }
      
      $scope.getResultadosEvaluaciones = function(year){
        $scope.resultadosEvaluaciones_loaded = false;

        $scope.getEvaluaciones(year).then(function(data){//console.log(data);
            $scope.evaluaciones_table.resultadosEvaluaciones = data;
            $scope.evaluaciones_table.resultados = data;
            $scope.resultadosEvaluaciones_loaded = true;
        });
      }*/
      
      $scope.url_evaluaciones_advanzer = 'http://localhost:8080/advanzer_evaluacion';
      
      $scope.evaluaciones_table = [];
      
      $scope.resultadosEvaluaciones_loaded = false;
      
      $scope.evaluaciones_table.tamanioTablaResultadosEvaluaciones = 10;
      
      $scope.evaluaciones_table.resultadosEvaluaciones = [
          /*{nombre:"Empleado", rating:"A", total:"3.00", feedback:"Enterado"}*/
      ];
      
      $scope.evaluaciones_table.resultados = [
          /*{nombre:"Empleado", rating:"A", total:"3.00", feedback:"Enterado"}*/
      ];
      
      //$scope.getResultadosEvaluaciones(2016);
      
      
  /*--------------------------------------------------------------------------------------------*/
      
  }

})();