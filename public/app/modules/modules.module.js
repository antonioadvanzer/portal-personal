/**
 * @author Antonio Baez
 * created on 9.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules', [
    'ui.router',

    'PortalPersonal.modules.principal',
    'PortalPersonal.modules.evaluaciones',
    'PortalPersonal.modules.vacaciones',
    'PortalPersonal.modules.permisos_de_ausencia',
    'PortalPersonal.modules.cartas_y_constancias_laborales'
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
    /*baSidebarServiceProvider.addStaticItem({
      title: 'Servicios',
      icon: 'ion-person',
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