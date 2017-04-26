/**
 * @author k.danovsky
 * created on 12.01.2016
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.pages.ui', [
    'PortalPersonal.pages.ui.typography',
    'PortalPersonal.pages.ui.buttons',
    'PortalPersonal.pages.ui.icons',
    'PortalPersonal.pages.ui.modals',
    'PortalPersonal.pages.ui.grid',
    'PortalPersonal.pages.ui.alerts',
    'PortalPersonal.pages.ui.progressBars',
    'PortalPersonal.pages.ui.notifications',
    'PortalPersonal.pages.ui.tabs',
    'PortalPersonal.pages.ui.slider',
    'PortalPersonal.pages.ui.panels',
  ])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('ui', {
          url: '/ui',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          title: 'UI Features',
          sidebarMeta: {
            icon: 'ion-android-laptop',
            order: 200,
          },
        });
  }

})();
