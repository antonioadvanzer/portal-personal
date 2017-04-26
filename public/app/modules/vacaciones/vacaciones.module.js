/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.vacaciones', ['ui.select', 'ngSanitize'])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('vacaciones', {
          url: '/vacaciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'VacacionesModuleCtrl',
          title: 'Vacaciones',
          sidebarMeta: {
            icon: 'ion-plane',
            order: 300,
          },
        })
        .state('vacaciones.informacion', {
          url: '/información',
          templateUrl: 'app/modules/vacaciones/vacaciones.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('vacaciones.solicitar', {
          url: '/solicitar',
          templateUrl: 'app/modules/vacaciones/formularios/solicitarVacaciones.html',
          title: 'Solicitar',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('vacaciones.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'app/modules/vacaciones/solicitudes/solicitudes.html',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        });
    $urlRouterProvider.when('/vacaciones','/vacaciones/informacion');
  }

})();
