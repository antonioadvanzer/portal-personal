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
          title: 'Evaluar',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.historial_desempenio', {
          url: '/historial_desempenio',
          templateUrl: 'theme/modules/evaluation/historial_desempenio',
          title: 'Historial de Desempeño',
          sidebarMeta: {
            order: 1,
          },
        })
        .state('evaluaciones.perfil_de_evaluacion', {
          url: '/perfil_evaluacion',
          templateUrl: 'theme/modules/evaluation/perfil_evaluacion',
          title: 'Perfil de Evaluación',
          sidebarMeta: {
            order: 2,
          },
        })
        .state('evaluaciones.evaluar', {
          url: '/evaluar',
          templateUrl: 'theme/modules/evaluation/evaluar',
          title: 'Evaluar',
          /*sidebarMeta: {
            order: 3,
          },*/
        })
        .state('evaluaciones.feedback', {
          url: '/feedback',
          templateUrl: 'theme/modules/evaluation/feedback',
          title: 'Feedback',
          /*sidebarMeta: {
            order: 4,
          },*/
        })
        /*.state('evaluaciones.compromisos_internos', {
          url: '/compromisos_internos',
          templateUrl: 'theme/modules/evaluation/compromisos_internos',
          title: 'Compromisos Internos',
          /*sidebarMeta: {
            order: 5,
          },*
        })*/
        .state('evaluaciones.compromisos_internos_gv', {
          url: '/compromisos_internos_gv',
          templateUrl: 'theme/modules/evaluation/compromisos_internos_gv',
          title: 'Compromisos Internos - Capturar Gastos de Viaje',
        })
        .state('evaluaciones.compromisos_internos_h', {
          url: '/compromisos_internos_h',
          templateUrl: 'theme/modules/evaluation/compromisos_internos_h',
          title: 'Compromisos Internos - Capturar Harvest',
        })
        .state('evaluaciones.compromisos_internos_cv', {
          url: '/compromisos_internos_cv',
          templateUrl: 'theme/modules/evaluation/compromisos_internos_cv',
          title: 'Compromisos Internos - Capturar CV',
        })
        ;
  }

})();