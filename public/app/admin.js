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
  'PortalPersonal.admin_modules',
  'PortalPersonal.pages',
]);

app.run(function($rootScope) {
    //$rootScope.t_pageTop = t_pageTop;
    //$rootScope.theme.t_pageTop = "http://localhost:8000/theme/page_top";
    //$rootScope.t_pageTop = "http://localhost:8000/theme/page_top";
    
    $rootScope.theme = {};
    //$rootScope.theme.t_pageTop = "";
});