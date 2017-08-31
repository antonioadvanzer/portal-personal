/**
 * @author Antonio Baez
 * created on 24.08.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.services', ['ui.select', 'ngSanitize'])
      .config(routeConfig);

  /** @ngInject */
  function routeConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('servicios', {
          url: '/sevicios',
          template : '<ui-view  autoscroll="true" autoscroll-body-top></ui-view>',
          abstract: true,
          //controller: 'ServiciosModuleCtrl',
          title: 'Servicios',
          sidebarMeta: {
            icon: 'ion-briefcase',
            order: 300,
          },
        })
        /*.state('servicios.informacion', {
          url: '/información',
          templateUrl: 'theme/modules/services/information',
          title: 'Información',
          sidebarMeta: {
            order: 0,
          },
        })*/
        .state('servicios.vacaciones', {
          url: '/vacaciones',
          templateUrl: 'theme/modules/vacations/information',
          controller: 'VacacionesModuleCtrl',
          title: 'Vacaciones',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('servicios.solicitar_vacaciones', {
          url: '/vacaciones/solicitar',
          templateUrl: 'theme/modules/vacations/solicitar_vacaciones',
          controller: 'VacacionesModuleCtrl',
          title: 'Solicitar Vacaciones',
        })
        .state('servicios.solicitudes_de_vacaciones_realizadas', {
          url: '/vacaciones/solicitudes_realizadas',
          templateUrl: 'theme/modules/vacations/vista_solicitudes_realizadas',
          controller: 'VacacionesModuleCtrl',
          title: 'Solicitudes de Vacaciones',
        })
        .state('servicios.solicitudes_de_vacaciones_recibidas', {
          url: '/vacaciones/solicitudes_recibidas',
          templateUrl: 'theme/modules/vacations/vista_solicitudes_recibidas',
          controller: 'VacacionesModuleCtrl',
          title: 'Solicitudes de Vacaciones',
        })
        .state("servicios.detalle_autorizar_vacaciones", {
            url: "/vacaciones/ver_recibida",
            templateUrl: 'theme/modules/vacations/mostrar_solicitud_recibida',
            controller: 'VacacionesModuleCtrl',
            title: 'Solicitud Recibida',
        })
        .state("servicios.detalle_solicitud_vacaciones", {
            url: "/vacaciones/ver_propia",
            templateUrl: 'theme/modules/vacations/mostrar_solicitud_propia',
            controller: 'VacacionesModuleCtrl',
            title: 'Solicitud Propia',
        })
        .state('servicios.permisos_de_ausencia', {
          url: '/permisos_de_ausencia',
          templateUrl: 'theme/modules/absence/information',
          controller: 'PermisosDeAusenciaModuleCtrl',
          title: 'Permisos de Ausencia',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('servicios.solicitar_permiso_de_ausencia', {
          url: '/permisos_de_ausencia/solicitar',
          templateUrl: 'theme/modules/absence/solicitar_permiso_de_ausencia',
          controller: 'PermisosDeAusenciaModuleCtrl',
          title: 'Solicitar Permiso de Ausencia',
        })
        .state('servicios.solicitudes_de_permisos_de_ausencia_realizadas', {
          url: '/permisos_de_ausencia/solicitudes_realizadas',
          templateUrl: 'theme/modules/absence/vista_solicitudes_realizadas',
          controller: 'PermisosDeAusenciaModuleCtrl',
          title: 'Solicitudes de Permisos de Ausencia',
        })
        .state('servicios.solicitudes_de_permisos_de_ausencia_recibidas', {
          url: '/permisos_de_ausencia/solicitudes_recibidas',
          templateUrl: 'theme/modules/absence/vista_solicitudes_recibidas',
          controller: 'PermisosDeAusenciaModuleCtrl',
          title: 'Solicitudes de Permisos de Ausencia',
        })
        .state("servicios.detalle_solicitud_permiso_de_ausencia_enviada",{
            url: "/permisos_de_ausencia/ver_solicitud_enviada",
            params: {
                    //id_own_absence: null,
                    formAbsenceSended: null
                    },
            templateUrl: function (stateParams){
                    //return 'theme/modules/absence/mostrar_solicitud_propia/' + stateParams.id_onw_absence;
                    //return 'theme/modules/absence/mostrar_solicitud_propia/'+ stateParams.formAbsenceSended;
                    return 'theme/modules/absence/mostrar_solicitud_propia';
            },
            controller: 'PermisosDeAusenciaModuleCtrl',
            title: 'Solicitud Enviada',
        })
        .state("servicios.detalle_permiso_de_ausencia_recibida",{
            url: "/permisos_de_ausencia/ver_solicitud_recibida",
            templateUrl: 'theme/modules/absence/mostrar_solicitud_recibida',
            controller: 'PermisosDeAusenciaModuleCtrl',
            title: 'Solicitud Recibida',
        })
        .state('servicios.cartas_y_constancias_laborales', {
          url: '/cartas_y_constancias_laborales',
          templateUrl: 'theme/modules/letter/information',
          controller: 'CartasYConstanciasLaboralesModuleCtrl',
          title: 'Cartas y Constancias Laborales',
          sidebarMeta: {
            order: 0,
          },
        })
        .state('servicios.solicitar_carta', {
          url: '/cartas_y_constancias_laborales/solicitar',
          templateUrl: 'theme/modules/letter/solicitar_carta',
          controller: 'CartasYConstanciasLaboralesModuleCtrl',
          title: 'Solicitar Carta',
        })
        .state('servicios.solicitudes_de_cartas', {
          url: '/cartas_y_constancias_laborales/solicitudes',
          templateUrl: 'theme/modules/letter/vista_cartas',
          controller: 'CartasYConstanciasLaboralesModuleCtrl',
          title: 'Solicitudes de Cartas',
        })
        .state("servicios.detalle_carta", {
            url: "/cartas_y_constancias_laborales/ver_propia",
            templateUrl: 'theme/modules/letter/mostrar_carta',
            controller: 'CartasYConstanciasLaboralesModuleCtrl',
            title: 'Carta',
        });
      
    $urlRouterProvider.when('/servicios','/servicios/informacion');
  }
})();