/**
 * @author Antonio Baez
 * created on 21.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.evaluaciones', [])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider) {
    $stateProvider
        .state('evaluaciones', {
          url: '/evaluaciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'EvaluacionesModuleCtrl',
          title: 'Gestión de Desempeño',
          sidebarMeta: {
            icon: 'glyphicon glyphicon-check',
            order: 300,
          },
        })
        .state('evaluaciones.informacion', {
          url: '/informacion',
          templateUrl: 'theme/modules/evaluation/information',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        });
  }

})();