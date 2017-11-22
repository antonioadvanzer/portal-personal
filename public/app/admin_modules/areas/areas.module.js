/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.areas', ['ui.select', 'ngSanitize'])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('areas', {
          url: '/areas',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'AreasModuleCtrl',
          title: 'Áreas',
          sidebarMeta: {
            icon: 'ion-ios-browsers-outline',
            order: 0,
          },
        })
        /*.state('areas.informacion', {
          url: '/informacion',
          templateUrl: 'app/admin_modules/area/areas.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('areas.agregar', {
          url: '/agregar_area',
          templateUrl: 'admin-theme/modules/area/crear_area',
          title: 'Nueva Área',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('areas.lista_areas', {
          url: '/lista_areas',
          templateUrl: 'admin-theme/modules/area/lista_areas',
          title: 'Áreas',
          sidebarMeta: {
            order: 1,
          },
        })
        .state("areas.area_detalle",{
            url: "/ver_area",
            params: {
                id_area: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/area/ver_area';
            },
            title: 'Área',
        });
      
    $urlRouterProvider.when('/areas','/areas/informacion');
  }

})();