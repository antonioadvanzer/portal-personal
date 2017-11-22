/**
 * @author Antonio Baez
 * created on 18.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.tracks', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('tracks', {
          url: '/tracks',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'TracksModuleCtrl',
          title: 'Tracks',
          sidebarMeta: {
            icon: 'ion-ios-briefcase',
            order: 6,
          },
        })
        /*.state('tracks.informacion', {
          url: '/informacion',
          templateUrl: 'admin-theme/modules/track/information',
          title: 'Informacion',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('tracks.agregar', {
          url: '/agregar_track',
          templateUrl: 'admin-theme/modules/track/crear_track',
          title: 'Nuevo Track',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('tracks.lista_tracks', {
          url: '/lista_tracks',
          templateUrl: 'admin-theme/modules/track/lista_tracks',
          title: 'Tracks',
          sidebarMeta: {
            order: 1,
          },
        })
        .state("tracks.track_detalle",{
            url: "/ver_track",
            params: {
                id_track: null
            },
            templateUrl: function (stateParams){
                    return 'admin-theme/modules/track/ver_track';
            },
            title: 'Track',
        });
      
    $urlRouterProvider.when('/tracks','/tracks/informacion');
  }

})();