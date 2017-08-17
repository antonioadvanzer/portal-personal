/**
 * @author Antonio Baez
 * created on 16.08.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.requisiciones', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('requisiciones', {
          url: '/requisiciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'RequisicionesModuleCtrl',
          title: 'Requisiciones de Personal',
          sidebarMeta: {
            icon: 'ion-ios-world-outline',
            order: 300,
          },
        })
        .state('requisiciones.informacion', {
          url: '/informacion',
          templateUrl: 'theme/modules/requisition/information',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('requisiciones.solicitar', {
          url: '/solicitar',
          templateUrl: 'theme/modules/requisition/solicitar_requisicion',
          title: 'Nueva Requisición',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('requisiciones.requisiciones', {
          url: '/solicitudes',
          templateUrl: 'theme/modules/requisition/requisiciones',
          title: 'Requisiciones',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("requisiciones.detalle_revisar",{
            url: "/ver_recibida",
            params: {
                id_requisition_received: null
            },
            templateUrl: function (stateParams){
                    return 'theme/modules/requisition/mostrar_requisicion_recibida';
            },
            title: 'Requisición Recibida',
        })  
        .state("requisiciones.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_requisition_received: null
            },
            templateUrl: function (stateParams){
                    return 'theme/modules/requisition/mostrar_requisicion_recibida';
            },
            title: 'Requisición Recibida',
        })
        .state("requisiciones.detalle_requisicion",{
            url: "/ver_propia",
            params: {
                id_own_requisition: null
            },
            templateUrl: function (stateParams){
                    return 'theme/modules/requisition/mostrar_solicitud_propia';
            },
            title: 'Requisición Propia',
        });
      
    $urlRouterProvider.when('/requisiciones','/requisiciones/informacion');
  }

})();
