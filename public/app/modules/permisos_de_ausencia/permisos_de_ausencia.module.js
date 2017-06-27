/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.permisos_de_ausencia', [])
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
            icon: 'glyphicon glyphicon-transfer',
            order: 300,
          },
        })
        .state('permisos_de_ausencia.informacion', {
          url: '/informacion',
          templateUrl: 'theme/modules/absence/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('permisos_de_ausencia.solicitar', {
          url: '/solicitar',
          templateUrl: 'theme/modules/absence/solicitar_permiso_de_ausencia',
          title: 'Solicitar Permiso de Ausencia',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('permisos_de_ausencia.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'theme/modules/absence/solicitudes',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("permisos_de_ausencia.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/show_absence_received/' + stateParams.id_absence_received;
                    return 'theme/modules/absence/mostrar_solicitud_recibida';
            },
            title: 'Solicitud Recibida',
        })
        .state("permisos_de_ausencia.detalle_solicitud",{
            url: "/ver_propia",
            params: {
                id_onw_absence: null
            },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/mostrar_solicitud_propia/' + stateParams.id_onw_absence;
                    return 'theme/modules/absence/mostrar_solicitud_propia';
            },
            title: 'Solicitud Propia',
        })
        /*.state("permisos_de_ausencia.detalle_autorizar",{
            url: "/ver_recibida",
            params: {
                id_absence_received: null
            },
            templateUrl: function (stateParams){
                    return 'theme/modules/absence/show_absence_received/' + stateParams.id_absence_received;
            }
        })*/
        /*.state("permisos_de_ausencia.detalle_autorizar",{
            url:"/ver_recibida/:id_absence_received",
            templateUrl: 'theme/modules/absence/show_absence_received',
            controller: function ($stateParams) {
                // If we got here from a url of /ver_recibida/1
                expect($stateParams).toBe({id_absence_received: $stateParams.id});
            }
            
        })*/
        /*.state("permisos_de_ausencia.detalle_autorizar",{
            url:"/ver_recibida/:id_absence_received",
            templateUrl:['$stateParams', function ($stateParams) {
                return 'theme/modules/absence/show_absence_received/' + $stateParams.id;
            }],
            
        })*/;
      
    $urlRouterProvider.when('/permisos_de_ausencia','/permisos_de_ausencia/informacion');
  }

})();
