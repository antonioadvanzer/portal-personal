/**
 * @author Antonio Baez
 * created on 13.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.solicitudes', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('solicitudes', {
          url: '/solicitudes',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'SolicitudesModuleCtrl',
          title: 'Solicitudes',
          sidebarMeta: {
            icon: 'ion-ios-list-outline',
            order: 300,
          },
        })
        /*.state('solicitudes.informacion', {
          url: '/informacion',
          templateUrl: 'admin-theme/modules/request/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('solicitudes.toda_las_solicitudes', {
          url: '/solicitudes',
          templateUrl: 'admin-theme/modules/request/todas_las_solicitudes',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('solicitudes.solicitudes_canceladas', {
          url: '/solicitudes_canceladas',
          templateUrl: 'admin-theme/modules/request/solicitudes_canceladas',
          title: 'Solicitudes Canceladas',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('solicitudes.solicitudes_enviadas', {
          url: '/solicitudes_enviadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_enviadas',
          title: 'Solicitudes Enviadas',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('solicitudes.solicitudes_aceptadas', {
          url: '/solicitudes_aceptadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_aceptadas',
          title: 'Solicitudes Aceptadas',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('solicitudes.solicitudes_rechazadas', {
          url: '/solicitudes_rechazadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_rechazadas',
          title: 'Solicitudes Rechazadas',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('solicitudes.solicitudes_autorizadas', {
          url: '/solicitudes_autorizadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_autorizadas',
          title: 'Solicitudes Autorizadas',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("solicitudes.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/request/mostrar_solicitud';
            },
            title: 'Solicitud',
        });
      
    $urlRouterProvider.when('/solicitudes','/solicitudes/informacion');
  }

})();