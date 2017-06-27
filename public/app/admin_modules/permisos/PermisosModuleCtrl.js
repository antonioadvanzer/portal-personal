/**
 * @author Antonio Baez
 * created on 22.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.permisos')
      .controller('PermisosModuleCtrl', PermisosModuleCtrl);

  /** @ngInject */
  function PermisosModuleCtrl($scope, $http , $filter, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Permissions table -------------------------------------------------------------------------------*/
      
    $scope.tamanioTablaPermisos = 10;

    $scope.listaPermisos = [];
      
    $http.get("admin-theme/modules/permission/list_permissions").then(function (response) {
      $scope.listaPermisos = response.data;
    });
      
  /*--------------------------------------------------------------------------------------------*/
      
  /* Permissions by Area table -------------------------------------------------------------------------------*/
      
    $scope.tamanioTablaPermisosPorArea = 10;

    $scope.listaPermisosPorArea = [];
      
    $http.get("admin-theme/modules/permission/list_permissions_by_area").then(function (response) {
      $scope.listaPermisosPorArea = response.data;
    });
      
  /*--------------------------------------------------------------------------------------------*/
      
  /* Permissions by Posicion table -------------------------------------------------------------------------------*/
      
    $scope.tamanioTablaPermisosPorPosicion = 10;

    $scope.listaPermisosPorPocision = [];
      
    $http.get("admin-theme/modules/permission/list_permissions_by_position").then(function (response) {
      $scope.listaPermisosPorPocision = response.data;
    });
      
  /*--------------------------------------------------------------------------------------------*/
          
  }

})();