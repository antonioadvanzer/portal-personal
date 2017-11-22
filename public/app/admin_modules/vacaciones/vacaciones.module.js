/**
 * @author Antonio Baez
 * created on 13.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.vacaciones', [])
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
            icon: 'ion-ios-calendar-outline',
            order: 8,
          },
        })
        /*.state('vacaciones.informacion', {
          url: '/informacion',
          templateUrl: 'admin-theme/modules/request/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('vacaciones.solicitudes_aceptadas', {
          url: '/solicitudes_aceptadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_aceptadas',
          title: 'Aceptadas',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('vacaciones.solicitudes_autorizadas', {
          url: '/solicitudes_autorizadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_autorizadas',
          title: 'Autorizadas',
          sidebarMeta: {
            order: 1,
          },
        })
        .state('vacaciones.solicitudes_canceladas', {
          url: '/solicitudes_canceladas',
          templateUrl: 'admin-theme/modules/request/solicitudes_canceladas',
          title: 'Canceladas',
          sidebarMeta: {
            order: 2,
          },
        })
        .state('vacaciones.solicitudes_enviadas', {
          url: '/solicitudes_enviadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_enviadas',
          title: 'Enviadas',
          sidebarMeta: {
            order: 3,
          },
        })
        .state('vacaciones.solicitudes_rechazadas', {
          url: '/solicitudes_rechazadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_rechazadas',
          title: 'Rechazadas',
          sidebarMeta: {
            order: 4,
          },
        })
        .state('vacaciones.toda_las_solicitudes', {
          url: '/solicitudes',
          templateUrl: 'admin-theme/modules/request/todas_las_solicitudes',
          title: 'Todas',
          sidebarMeta: {
            order: 5,
          },
        })
        .state("vacaciones.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/request/mostrar_solicitud';
            },
            title: 'Solicitud',
        });
      
    $urlRouterProvider.when('/vacaciones','/vacaciones/informacion');
  }

})();