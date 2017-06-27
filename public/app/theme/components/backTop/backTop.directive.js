/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.theme.components')
      .directive('backTop', backTop);

  /** @ngInject */
  function backTop($rootScope) {
    return {
      restrict: 'E',
      //templateUrl: 'app/theme/components/backTop/backTop.html',
        templateUrl: $rootScope.theme.t_backTop,
      controller: function () {
        $('#backTop').backTop({
          'position': 200,
          'speed': 100
        });
      }
    };
  }

})();