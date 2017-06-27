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
          templateUrl: 'theme/modules/vacations/information',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('vacaciones.solicitar', {
          url: '/solicitar',
          templateUrl: 'theme/modules/vacations/solicitar_vacaciones',
          title: 'Solicitar Vacaciones',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('vacaciones.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'theme/modules/vacations/solicitudes',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("vacaciones.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/show_absence_received/' + stateParams.id_request_received;
                    return 'theme/modules/vacations/mostrar_solicitud_recibida';
            },
            title: 'Solicitud Recibida',
        })
        .state("vacaciones.detalle_solicitud",{
            url: "/ver_propia",
            params: {
                id_onw_request: null
            },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/mostrar_solicitud_propia/' + stateParams.id_onw_request;
                    return 'theme/modules/vacations/mostrar_solicitud_propia';
            },
            title: 'Solicitud Propia',
        });
    $urlRouterProvider.when('/vacaciones','/vacaciones/informacion');
  }

})();
