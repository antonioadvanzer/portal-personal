/**
 * @author v.lugovksy
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.theme.components')
      .directive('contentTop', contentTop);

  /** @ngInject */
  function contentTop($location, $state,$rootScope) {
    return {
      restrict: 'E',
      //templateUrl: 'app/theme/components/contentTop/contentTop.html',
        templateUrl: $rootScope.theme.t_contentTo,
      link: function($scope) {
        $scope.$watch(function () {
          $scope.activePageTitle = $state.current.title;
        });
      }
    };
  }

})();