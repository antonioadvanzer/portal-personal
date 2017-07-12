/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.principal', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('principal', {
          url: '/principal',
          templateUrl: 'app/admin_modules/principal/principal.html',
          title: 'Principal',
          sidebarMeta: {
            icon: 'ion-android-home',
            order: 0,
          },
        });
  }

})();
