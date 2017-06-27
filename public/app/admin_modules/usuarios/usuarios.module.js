/**
 * @author Antonio Baez
 * created on 12.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.usuarios', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('usuarios', {
          url: '/usuarios',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'UsuariosModuleCtrl',
          title: 'Usuarios',
          sidebarMeta: {
            icon: 'ion-person-stalker',
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
        .state('usuarios.agregar', {
          url: '/agregar_usuario',
          templateUrl: 'admin-theme/modules/user/agregar_usuario',
          title: 'Nuevo Empleado',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('usuarios.colaboradores_activos', {
          url: '/colaboradores_activos',
          //templateUrl: 'app/admin_modules/usuarios/colaboradores/usuarios_activos.html',
            /*templateUrl: function ($rootScope){alert($rootScope.modules.am_usuariosActivos);
                return $rootScope.modules.am_usuariosActivos;
            },*/
            templateUrl: 'admin-theme/modules/user/usuarios_activos',
          title: 'Colaboradores Activos',
          sidebarMeta: {
            order: 100,
          },
        })
        .state('usuarios.colaboradores_inactivos', {
          url: '/colaboradores_inactivos',
          templateUrl: 'admin-theme/modules/user/usuarios_inactivos',
          title: 'Colaboradores Inactivos',
          sidebarMeta: {
            order: 100,
          },
        });
      
    $urlRouterProvider.when('/usuarios','/usuarios/informacion');
  }

})();