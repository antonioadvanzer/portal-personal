/**
 * @author Antonio Baez
 * created on 12.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules', [
    'ui.router',

    'PortalPersonal.admin_modules.principal',
    'PortalPersonal.admin_modules.direcciones',
    'PortalPersonal.admin_modules.areas',
    'PortalPersonal.admin_modules.usuarios',
    'PortalPersonal.admin_modules.permisos',
  ])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($urlRouterProvider, baSidebarServiceProvider) {
    $urlRouterProvider.otherwise('/principal');
    
      /*baSidebarServiceProvider.addStaticItem({
      title: 'Administración',
      icon: 'ion-gear-a',
      subMenu: [{
        title: 'Modo Administrador',
        fixedHref: 'admin.html',
        blank: true
      }]
    });*/
      
    /*baSidebarServiceProvider.addStaticItem({
      title: 'Pages',
      icon: 'ion-document',
      subMenu: [{
        title: 'Sign In',
        fixedHref: 'auth.html',
        blank: true
      }, {
        title: 'Sign Up',
        fixedHref: 'reg.html',
        blank: true
      }, {
        title: 'User Profile',
        stateRef: 'profile'
      }, {
        title: '404 Page',
        fixedHref: '404.html',
        blank: true
      }]
    });
    baSidebarServiceProvider.addStaticItem({
      title: 'Menu Level 1',
      icon: 'ion-ios-more',
      subMenu: [{
        title: 'Menu Level 1.1',
        disabled: true
      }, {
        title: 'Menu Level 1.2',
        subMenu: [{
          title: 'Menu Level 1.2.1',
          disabled: true
        }]
      }]
    });*/
    
  }

})();