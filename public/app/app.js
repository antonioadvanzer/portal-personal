'use strict';

 var app = angular.module('PortalPersonal', [
  'ngAnimate',
  'ui.bootstrap',
  'ui.sortable',
  'ui.router',
  'ngTouch',
  'toastr',
  'smart-table',
  "xeditable",
  'ui.slimscroll',
  'ngJsTree',
  'angular-progress-button-styles',

  'PortalPersonal.theme',
  //'PortalPersonal.pages',
  'PortalPersonal.modules',
]);

app.run(function($rootScope) {
    //$rootScope.t_pageTop = t_pageTop;
    //$rootScope.theme.t_pageTop = "http://localhost:8000/theme/page_top";
    //$rootScope.t_pageTop = "http://localhost:8000/theme/page_top";
    
    $rootScope.theme = {};
    //$rootScope.theme.t_pageTop = "";
    $rootScope.theme = {};
    $rootScope.modules = {};
    /*$rootScope.permission = [
        "P1" : 1,
        "P2" : 0,
        "P3" : 0
    ];*/
    $rootScope.formOwnAbsence = {};
    $rootScope.formAbsenceReceived = {};
    $rootScope.formOwnRequest = {};
    $rootScope.formRequestReceived = {};
    $rootScope.formLetterDetail={};
    $rootScope.formLetterDetail={};
    $rootScope.notification={};
    
    $rootScope.formEditUser = {};
    $rootScope.requests_table = {};
    $rootScope.letter_table = {};
    $rootScope.vacations_table = {};
    
    $rootScope.formRequest = {};
    $rootScope.formLetter = {};
    
});