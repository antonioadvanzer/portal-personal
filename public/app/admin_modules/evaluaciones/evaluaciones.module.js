/**
 * @author Antonio Baez
 * created on 07.07.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.evaluaciones', ['ui.select', 'ngSanitize'])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('evaluaciones', {
          url: '/evaluaciones',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          controller: 'EvaluacionesModuleCtrl',
          title: 'Evaluaciones',
          sidebarMeta: {
            icon: 'ion-edit',
            order: 300,
          },
        })
        /*.state('evaluaciones.informacion', {
          url: '/informacion',
          templateUrl: 'app/admin_modules/area/areas.html',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        /*.state('evaluaciones.resultados_evaluaciones', {
          url: '/resultados_evaluaciones',
          templateUrl: 'admin-theme/modules/evaluation/resultados_evaluaciones',
          title: 'Resultados Evaluaciones',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('evaluaciones.resultados_evaluaciones', {
          url: '/resultados_evaluaciones',
          templateUrl: 'admin-theme/modules/evaluation/resultados_evaluaciones',
          title: 'Resultados Evaluaciones',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.evaluadores_por_evaluador', {
          url: '/evaluadores_por_evaluador',
          templateUrl: 'admin-theme/modules/evaluation/evaluaciones_por_evaluador',
          title: 'Evaluadores por Evaluador',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.evaluaciones_pendientes', {
          url: '/evaluaciones_pendientes',
          templateUrl: 'admin-theme/modules/evaluation/evaluaciones_pendientes',
          title: 'Evaluaciones Pendientes',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.responsabilidades_funcionales', {
          url: '/responsabilidades_funcionales',
          templateUrl: 'admin-theme/modules/evaluation/responsabilidades_funcionales',
          title: 'Responsabilidades Funcionales',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.competencias_laborales', {
          url: '/competencias_laborales',
          templateUrl: 'admin-theme/modules/evaluation/competencias_laborales',
          title: 'Competencias Laborales',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.gestion_tiempos_evaluaciones', {
          url: '/gestion_tiempos_evaluaciones',
          templateUrl: 'admin-theme/modules/evaluation/gestion_tiempos_evaluaciones',
          title: 'Gestión de Tiempos de Evaluaciones',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('evaluaciones.administrar_evaluaciones', {
          url: '/administrar_evaluaciones',
          templateUrl: 'admin-theme/modules/evaluation/administrar_evaluaciones',
          title: 'Administrar Evaluaciones',
          sidebarMeta: {
            order: 0,
          },
        })
        ;
      
    $urlRouterProvider.when('/evaluaciones','/evaluaciones/informacion');
  }

})();