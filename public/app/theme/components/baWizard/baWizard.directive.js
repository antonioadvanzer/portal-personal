(function() {
  'use strict';

  angular.module('PortalPersonal.theme.components')
    .directive('baWizard', baWizard);

  /** @ngInject */
  function baWizard($rootScope) {
    return {
      restrict: 'E',
      transclude: true,
      //templateUrl: 'app/theme/components/baWizard/baWizard.html',
        templateUrl: $rootScope.theme.ba_wizard,
      controllerAs: '$baWizardController',
      controller: 'baWizardCtrl'
    }
  }
})();
