/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.direcciones', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('direcciones', {
          url: '/direcciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'DireccionesModuleCtrl',
          title: 'Direcciones',
          sidebarMeta: {
            icon: 'ion-navigate',
            order: 300,
          },
        })
        /*.state('direcciones.informacion', {
          url: '/informacion',
          templateUrl: 'app/admin_modules/directions/direcciones.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('direcciones.agregar', {
          url: '/agregar_direccion',
          templateUrl: 'admin-theme/modules/direction/crear_direccion',
          title: 'Nueva Dirección',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('direcciones.lista_direcciones', {
          url: '/lista_direcciones',
          templateUrl: 'admin-theme/modules/direction/lista_direcciones',
          title: 'Direcciones',
          sidebarMeta: {
            order: 100,
          },
        })
        .state("direcciones.direccion_detalle",{
            url: "/ver_direccion",
            params: {
                id_direction: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/direction/ver_direccion';
            },
            title: 'Dirección',
        });
      
    $urlRouterProvider.when('/direcciones','/direcciones/informacion');
  }

})();