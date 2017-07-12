/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.principal', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('principal', {
          url: '/principal',
          templateUrl: 'app/modules/principal/principal.html',
          title: 'Principal',
          sidebarMeta: {
            icon: 'ion-android-home',
            order: 0,
          },
        });
  }

})();
