/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.evaluaciones')
      .controller('EvaluacionesModuleCtrl', EvaluacionesModuleCtrl);

  /** @ngInject */
  function EvaluacionesModuleCtrl($scope, $filter, $http, editableOptions, editableThemes) {
      
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
  }

})();