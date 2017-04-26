/**
 * @author Antonio Baez
 * created on 16.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.cartas_y_constancias_laborales', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('cartas_y_constancias_laborales', {
          url: '/cartas_y_constancias_laborales',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'CartasYConstanciasLaboralesModuleCtrl',
          title: 'Cartas y Constancias Laborales',
          sidebarMeta: {
            icon: 'glyphicon glyphicon-duplicate',
            order: 300,
          },
        })
        .state('cartas_y_constancias_laborales.informacion', {
          url: '/información',
          templateUrl: 'app/modules/cartas_y_constancias_laborales/cartas_y_constancias_laborales.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('cartas_y_constancias_laborales.solicitar', {
          url: '/solicitar',
          templateUrl: 'app/modules/cartas_y_constancias_laborales/formularios/solicitar_carta.html',
          title: 'Solicitar',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('cartas_y_constancias_laborales.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'app/modules/cartas_y_constancias_laborales/solicitudes/solicitudes.html',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        });
    $urlRouterProvider.when('/cartas_y_constancias_laborales','/cartas_y_constancias_laborales/informacion');
  }

})();