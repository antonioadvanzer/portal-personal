/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.evaluaciones')
      .controller('EvaluacionesModuleCtrl', EvaluacionesModuleCtrl);

  /** @ngInject */
  function EvaluacionesModuleCtrl($scope, $filter, $http, $state, editableOptions, editableThemes) {
      
      //$scope.evaluation = {}
      //$scope.evaluation.url_evaluaciones_advanzer = 'http://localhost:8080/advanzer_evaluacion';
      
      //var formData = new FormData();
      //formData.append("email", $scope.user.email);
      
      /*$http.post('http://localhost:8080/advanzer_evaluacion/start_session', formData, {
            //transformRequest: angular.identity,
            //headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            
        })
        .error(function (response) {
            console.log(response);
        });*/
      
        /*$http.get('http://localhost:8080/advanzer_evaluacion/main/start_session/'+$scope.user.email).then(function (response) {
            console.log(response);
        });*/
      
      //$state.transitionTo('evaluaciones.evaluar', {title:'Evaluacion'});
      /*--------------------------------------------------------------------------------------------------*/
      
      $scope.evaluation_active = false;
      
      /*$scope.capturista_gastos_viaje = false;
      $scope.capturista_harvest = false;
      $scope.capturista_cv = false;*/
      
      $http.get('theme/modules/evaluation/evaluation_active').then(function (response) {
            $scope.evaluation_active = response.data == '1' ? true : false;
      });
      
      $http.get('theme/modules/evaluation/evaluation_expire').then(function (response) {
            $scope.evaluation_expired = response.data == '1' ? true : false;
      });
      
      
      /*--------------------------------------------------------------------------------------------------*/
    
        function resetForm(stateName) {
            if ($state.is(stateName)) {
                $state.reload();
            } else {
                $state.go(stateName);
            }
        }
      
      /*--------------------------------------------------------------------------------------------------*/
      
        $scope.evaluar = function() {
            resetForm("evaluaciones.evaluar");
        };
      
        $scope.feedback = function() {
            resetForm("evaluaciones.feedback");
        };
      
        /*$scope.comprimsosInternos = function() {
            resetForm("evaluaciones.compromisos_internos");
        };*/
      
        $scope.capturarGastosDeViaje = function() {
            resetForm("evaluaciones.compromisos_internos_gv");
        };

        $scope.capturarHarvest = function() {
            resetForm("evaluaciones.compromisos_internos_h");
        };

        $scope.capturarCV = function() {
            resetForm("evaluaciones.compromisos_internos_cv");
        };

      /*--------------------------------------------------------------------------------------------------*/
  }

})();