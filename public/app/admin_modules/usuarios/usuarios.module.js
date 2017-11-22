/**
 * @author Antonio Baez
 * created on 12.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.usuarios', ['ui.select', 'ngSanitize'])
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
            order: 7,
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
            order: 1,
          },
        })
        .state('usuarios.colaboradores_inactivos', {
          url: '/colaboradores_inactivos',
          templateUrl: 'admin-theme/modules/user/usuarios_inactivos',
          title: 'Colaboradores Inactivos',
          sidebarMeta: {
            order: 2,
          },
        })
        .state("usuarios.usuario_detalle",{
            url: "/ver_usuario",
            params: {
                id_user: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/user/ver_usuario';
            },
            title: 'Usuario',
        });
      
    $urlRouterProvider.when('/usuarios','/usuarios/informacion');
  }

})();