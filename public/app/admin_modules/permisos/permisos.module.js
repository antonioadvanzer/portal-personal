/**
 * @author Antonio Baez
 * created on 22.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.permisos', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('permisos', {
          url: '/permisos',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'PermisosModuleCtrl',
          title: 'Permisos',
          sidebarMeta: {
            icon: 'ion-ios-toggle-outline',
            order: 300,
          },
        })
        /*.state('usuarios.informacion', {
          url: '/informacion',
          templateUrl: 'app/admin_modules/usuarios/usuarios.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        /*.state('usuarios.agregar', {
          url: '/agregar_usuario',
          templateUrl: 'admin-theme/modules/agregar_usuario',
          title: 'Nuevo Empleado',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('permisos.lista_permisos', {
          url: '/lista_permisos',
          templateUrl: 'admin-theme/modules/permission/lista_permisos',
          title: 'Permisos',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('permisos.lista_permisos_area', {
          url: '/lista_permisos_area',
          templateUrl: 'admin-theme/modules/permission/lista_permisos_por_area',
          title: 'Permisos por Area',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('permisos.lista_permisos_posicion', {
          url: '/lista_permisos_posicion',
          templateUrl: 'admin-theme/modules/permission/lista_permisos_por_posicion',
          title: 'Permisos por Posición',
          sidebarMeta: {
            order: 100,
          },
        });
      
    $urlRouterProvider.when('/permisos','/permisos/informacion');
  }

})();