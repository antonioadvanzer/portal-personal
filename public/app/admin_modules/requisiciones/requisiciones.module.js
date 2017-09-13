/**
 * @author Antonio Baez
 * created on 13.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.requisiciones', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('requisiciones', {
          url: '/requisiciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'RequisicionesModuleCtrl',
          title: 'Requisiciones',
          sidebarMeta: {
            icon: 'ion-ios-briefcase-outline',
            order: 300,
          },
        })
        /*.state('requisiciones.informacion', {
          url: '/informacion',
          templateUrl: 'admin-theme/modules/requisition/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('requisiciones.requisiciones_aceptadas', {
              url: '/requisiciones_aceptadas',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_aceptadas',
              title: 'Aceptadas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.requisiciones_autorizadas', {
              url: '/requisiciones_autorizadas',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_autorizadas',
              title: 'Autorizadas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.requisiciones_canceladas', {
              url: '/requisiciones_canceladas',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_canceladas',
              title: 'Canceladas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.requisiciones_completadas', {
              url: '/requisiciones_completadas',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_completadas',
              title: 'Completadas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.requisiciones_enviadas', {
              url: '/requisiciones_enviadas',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_enviadas',
              title: 'Enviadas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.requisiciones_en_proceso', {
              url: '/requisiciones_en_proceso',
              templateUrl: 'admin-theme/modules/requisition/requisiciones_en_proceso',
              title: 'En Proceso',
              sidebarMeta: {
                order: 100,
              },
        })
        .state('requisiciones.toda_las_requisiciones', {
              url: '/requisiciones',
              templateUrl: 'admin-theme/modules/requisition/todas_las_requisiciones',
              title: 'Todas',
              sidebarMeta: {
                order: 100,
              },
        })
        .state("requisiciones.detalle_requisicion",{
            url: "/ver_requisicion_detalle",
            params: {
                id_requisition_received: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/requisition/mostrar_requisicion';
            },
            title: 'Requisición',
        });
      
    $urlRouterProvider.when('/requisiciones','/requisiciones/informacion');
  }

})();