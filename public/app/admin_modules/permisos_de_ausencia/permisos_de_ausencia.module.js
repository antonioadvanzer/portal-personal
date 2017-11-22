/**
 * @author Antonio Baez
 * created on 13.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.permisos_de_ausencia', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('permisos_de_ausencia', {
          url: '/permisos_de_ausencia',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'PermisosDeAusenciaModuleCtrl',
          title: 'Permisos de Ausencia',
          sidebarMeta: {
            icon: 'ion-ios-list-outline',
            order: 3,
          },
        })
        /*.state('permisos_de_ausencia.informacion', {
          url: '/informacion',
          templateUrl: 'admin-theme/modules/request/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })*/
                .state('permisos_de_ausencia.solicitudes_aceptadas', {
          url: '/solicitudes_aceptadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_aceptadas',
          title: 'Aceptadas',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('permisos_de_ausencia.solicitudes_autorizadas', {
          url: '/solicitudes_autorizadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_autorizadas',
          title: 'Autorizadas',
          sidebarMeta: {
            order: 1,
          },
        })
        .state('permisos_de_ausencia.solicitudes_canceladas', {
          url: '/solicitudes_canceladas',
          templateUrl: 'admin-theme/modules/request/solicitudes_canceladas',
          title: 'Canceladas',
          sidebarMeta: {
            order: 3,
          },
        })
        .state('permisos_de_ausencia.solicitudes_enviadas', {
          url: '/solicitudes_enviadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_enviadas',
          title: 'Enviadas',
          sidebarMeta: {
            order: 4,
          },
        })
        .state('permisos_de_ausencia.solicitudes_rechazadas', {
          url: '/solicitudes_rechazadas',
          templateUrl: 'admin-theme/modules/request/solicitudes_rechazadas',
          title: 'Rechazadas',
          sidebarMeta: {
            order: 5,
          },
        })
        .state('permisos_de_ausencia.toda_las_solicitudes', {
          url: '/solicitudes',
          templateUrl: 'admin-theme/modules/request/todas_las_solicitudes',
          title: 'Todas',
          sidebarMeta: {
            order: 6,
          },
        })
        .state("permisos_de_ausencia.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/request/mostrar_solicitud';
            },
            title: 'Solicitud',
        });
      
    $urlRouterProvider.when('/permisos_de_ausencia','/permisos_de_ausencia/informacion');
  }

})();