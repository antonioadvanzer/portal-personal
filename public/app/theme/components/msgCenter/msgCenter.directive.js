/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.theme.components')
      .directive('msgCenter', msgCenter);

  /** @ngInject */
  function msgCenter($rootScope) {
    return {
      restrict: 'E',
      //templateUrl: 'app/theme/components/msgCenter/msgCenter.html',
        templateUrl: $rootScope.theme.t_msgCenter,
      controller: 'MsgCenterCtrl'
    };
  }

})();