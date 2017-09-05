/**
 * @author Antonio Baez
 * created on 22.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.permisos')
      .controller('PermisosModuleCtrl', PermisosModuleCtrl);

  /** @ngInject */
  function PermisosModuleCtrl($scope, $http, $filter, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Permissions table -------------------------------------------------------------------------------*/
    
    $scope.getPermissions = function(){
    //function getPermissions(){
        return $http.get("admin-theme/modules/permission/list_permissions").then(function (response) {
        //$.getJSON("admin-theme/modules/permission/list_permissions", function( data ) {
            return response.data;
            //$scope.permissions_table.listaPermisos = data;
            //$scope.$apply();
        });
    }
    
    $scope.getPermissionsByArea = function(){
    //function getPermissionsByArea(){
        return $http.get("admin-theme/modules/permission/list_permissions_by_area").then(function (response) {
        //$.getJSON("admin-theme/modules/permission/list_permissions_by_area", function( data ) {
            return response.data;
            //$scope.permissions_table.listaPermisosPorArea = data;
            //$scope.$apply();
        });
    }
    
    $scope.getPermissionsByPosition = function(){
    //function getPermissionsByPosition(){
        return $http.get("admin-theme/modules/permission/list_permissions_by_position").then(function (response) {
        //$.getJSON("admin-theme/modules/permission/list_permissions_by_position", function( data ) {
            return response.data;
            //$scope.permissions_table.listaPermisosPorPocision = data;
            //$scope.$apply();
        });
    }
    
    $scope.refreshTables = function(){
        
        $scope.getPermissions().then(function(data) {
            $scope.permissions_table.listaPermisos = data;
            $scope.permissions_table.permisos = data;
        });
        $scope.getPermissionsByArea().then(function(data) {
            $scope.permissions_table.listaPermisosPorArea = data;
            $scope.permissions_table.permisosPorArea = data;
        });
        $scope.getPermissionsByPosition().then(function(data) {
            $scope.permissions_table.listaPermisosPorPosicion = data;
            $scope.permissions_table.permisosPorPosicion = data;
        });
        
        /*getPermissions();
        getPermissionsByArea();
        getPermissionsByPosition();*/
    }
    
    $scope.permissions_table = [];
    
    // Permissions
    
    $scope.permissions_table.tamanioTablaPermisos = 10;

    $scope.permissions_table.listaPermisos = [];
    
    // Permissions by Area table
      
    $scope.permissions_table.tamanioTablaPermisosPorArea = 10;

    $scope.permissions_table.listaPermisosPorArea = [];
    
    // Permissions by Posicion table 
      
    $scope.permissions_table.tamanioTablaPermisosPorPosicion = 10;

    $scope.permissions_table.listaPermisosPorPosicion = [];
      
    $scope.refreshTables();
  /*--------------------------------------------------------------------------------------------*/
          
  }

})();