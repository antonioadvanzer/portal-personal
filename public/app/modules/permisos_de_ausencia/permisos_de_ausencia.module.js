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
          url: '/información',
          templateUrl: 'app/modules/permisos_de_ausencia/permisos_de_ausencia.html',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('permisos_de_ausencia.solicitar', {
          url: '/solicitar',
          templateUrl: 'app/modules/permisos_de_ausencia/formularios/solicitar_permiso_de_ausencia.html',
          title: 'Solicitar',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('permisos_de_ausencia.solicitudes', {
          url: '/solicitudes',
          templateUrl: 'app/modules/permisos_de_ausencia/solicitudes/solicitudes.html',
          title: 'Solicitudes',
          sidebarMeta: {
            order: 100,
          },
        });
    $urlRouterProvider.when('/permisos_de_ausencia','/permisos_de_ausencia/informacion');
  }

})();
