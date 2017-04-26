/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.cartas_y_constancias_laborales')
      .controller('CartasYConstanciasLaboralesModuleCtrl', CartasYConstanciasLaboralesModuleCtrl);

  /** @ngInject */
  function CartasYConstanciasLaboralesModuleCtrl($scope, $filter, editableOptions, editableThemes) {
  	$scope.tamanioTablaSolicitudes = 10;

    $scope.solicitudesPropias = [
      {
        id: 1,
        folio: '123456',
        dirigido: 'bnvnbnvb',
        observaciones: 'fdgrtrgr'
      }
    ];

  }

})();