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
          templateUrl: 'theme/modules/letter/information',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('cartas_y_constancias_laborales.solicitar', {
          url: '/solicitar',
          templateUrl: 'theme/modules/letter/solicitar_carta',
          title: 'Solicitar Carta',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('cartas_y_constancias_laborales.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'theme/modules/letter/cartas',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("cartas_y_constancias_laborales.detalle_carta",{
            url: "/ver_propia",
            params: {
                id_letter: null
            },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/mostrar_solicitud_propia/' + stateParams.id_onw_absence;
                    return 'theme/modules/letter/mostrar_carta';
            },
            title: 'Carta',
        });
      
    $urlRouterProvider.when('/cartas_y_constancias_laborales','/cartas_y_constancias_laborales/informacion');
  }

})();