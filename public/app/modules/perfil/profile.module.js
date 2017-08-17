/**
 * @author Antonio Baez
 * created on 09.08.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.profile', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('profile', {
          url: '/profile',
          title: 'Perfil',
          templateUrl: 'theme/modules/user/get_profile',
          controller: 'ProfilePageCtrl',
        });
  }

})();
