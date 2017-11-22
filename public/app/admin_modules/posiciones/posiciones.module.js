/**
 * @author Antonio Baez
 * created on 19.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.posiciones', ['ui.select', 'ngSanitize'])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('posiciones', {
          url: '/posiciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'PosicionesModuleCtrl',
          title: 'Posiciones',
          sidebarMeta: {
            icon: 'ion-android-locate',
            order: 4,
          },
        })
        /*.state('posiciones.informacion', {
          url: '/informacion',
          templateUrl: 'app/admin_modules/position/posiciones.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('posiciones.agregar', {
          url: '/agregar_posicion',
          templateUrl: 'admin-theme/modules/position/crear_posicion',
          title: 'Nueva Posicion',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('posiciones.lista_posiciones', {
          url: '/lista_posiciones',
          templateUrl: 'admin-theme/modules/position/lista_posiciones',
          title: 'Posiciones',
          sidebarMeta: {
            order: 1,
          },
        })
        .state("posiciones.posicion_detalle",{
            url: "/ver_posicion",
            params: {
                id_area: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/position/ver_posicion';
            },
            title: 'Posicion',
        });
      
    $urlRouterProvider.when('/posiciones','/posiciones/informacion');
  }

})();