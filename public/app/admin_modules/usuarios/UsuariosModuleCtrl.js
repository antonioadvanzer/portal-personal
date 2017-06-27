/**
 * @author Antonio Baez
 * created on 12.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.usuarios')
      .controller('UsuariosModuleCtrl', UsuariosModuleCtrl);

  /** @ngInject */
  function UsuariosModuleCtrl($scope, $http, $filter, fileReader, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Users table -------------------------------------------------------------------------------*/
      
      $scope.tamanioTablaEmpleadosActivos = 10;
    
      $scope.tamanioTablaEmpleadosIactivos = 10;

    $scope.empleadosActivos = [
      /*{
        id: 1,
        nomina: '123456',
        nomina: 'oqowqpq',
        email: 'bnvnbnvb',
        empresa: 'fdgrtrgr',
          track: 'bnvnbnvb',
        posicion: 'fdgrtrgr',
          area: 'bnvnbnvb',
        plaza: 'fdgrtrgr'
      }*/
    ];
      
    $scope.empleadosInactivos = [];
      
    $http.get("admin-theme/modules/user/users_active").then(function (response) {
      $scope.empleadosActivos = response.data;
    });
      
    $http.get("admin-theme/modules/user/users_deactive").then(function (response) {
      $scope.empleadosInactivos = response.data;
    });
      
  /*--------------------------------------------------------------------------------------------*/
      
  /* New user ----------------------------------------------------------------------------------*/
    
    $scope.formUser={};
      
    $scope.formUser.imageSrc = "";      
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');//$filter('profilePicture')('picture');
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');
    $scope.formUser.noPicture = false;
      
    $scope.removePicture = function () {
      $scope.formUser.imageSrc = '';//$filter('appImage')('theme/no-photo.png');
      $scope.formUser.noPicture = true;
    };

    $scope.uploadPicture = function () {
      var fileInput = document.getElementById('uploadFile');
      fileInput.click();
    };
      
    /*$scope.getFile = function () {
      fileReader.readAsDataUrl($scope.file, $scope)
          .then(function (result) {
            $scope.picture = result;
          });
    };*/
/*
    $scope.socialProfiles = [
      {
        name: 'Facebook',
        href: 'https://www.facebook.com/akveo/',
        icon: 'socicon-facebook'
      },
      {
        name: 'Twitter',
        href: 'https://twitter.com/akveo_inc',
        icon: 'socicon-twitter'
      },
      {
        name: 'Google',
        icon: 'socicon-google'
      },
      {
        name: 'LinkedIn',
        href: 'https://www.linkedin.com/company/akveo',
        icon: 'socicon-linkedin'
      },
      {
        name: 'GitHub',
        href: 'https://github.com/akveo',
        icon: 'socicon-github'
      },
      {
        name: 'StackOverflow',
        icon: 'socicon-stackoverflow'
      },
      {
        name: 'Dribbble',
        icon: 'socicon-dribble'
      },
      {
        name: 'Behance',
        icon: 'socicon-behace'
      }
    ];

    $scope.unconnect = function (item) {
      item.href = undefined;
    };

    $scope.showModal = function (item) {
      $uibModal.open({
        animation: false,
        controller: 'ProfileModalCtrl',
        templateUrl: 'app/pages/profile/profileModal.html'
      }).result.then(function (link) {
          item.href = link;
        });
    };
*/
    
    $scope.formUser.dt = new Date();
    $scope.open = open;
    $scope.opened = false;
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[1];
    $scope.options = {
        dateDisabled: disabled,
        showWeeks: false
    };

    function open() {
        $scope.opened = true;
    }
      
    function disabled(data) {
        var date = data.date,
        mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
    }
      
    //$scope.switches = [true, true, false, true, true, false];
      
    $scope.disabled = undefined;
    
    $scope.selectedArea = {};
    //$scope.selectedArea.selected = "";
    $scope.standardArea = {};
    $scope.standardSelectAreas = [];
      
    $http.get("admin-theme/modules/area/areas_activas").then(function (response) {
      $scope.standardSelectAreas = response.data;
    });
      
    $scope.getDirection = function (item, model){
        
        $http.get("admin-theme/modules/direction/direccion_por_area/"+model.id).then(function (response) {
          $scope.direction = response.data.name;
        });
        
        // Get permissions by area
        $http.get("admin-theme/modules/permission/permisos_por_area/"+model.id).then(function (response) {
          $scope.permisosArea = response.data;
          $scope.getPermissions();
        });
    };
      
    $scope.selectedTrack = {};
    $scope.standardTrack = {};
    $scope.standardSelectTracks = [];
      
    $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
      $scope.standardSelectTracks = response.data;
    });
      
    /*$scope.getPositions = function() {
        console.log($scope.selectedTrack.selected);
    }*/
    $scope.getPositions = function (item, model){
        //vm.counter++;
        //vm.eventResult = {item: item, model: model};
        //alert(model.id);
        
        $http.get("admin-theme/modules/position/posiciones_activas/"+model.id).then(function (response) {
          $scope.standardSelectPositions = response.data;
        });
    };
    
    $scope.selectedPosition = {};
    $scope.standardPosition = {};
    $scope.standardSelectPositions = [];
      
    $scope.getPermissionsPositions = function (item, model){
        
        // Get permissions by area
        $http.get("admin-theme/modules/permission/permisos_por_posicion/"+model.id).then(function (response) {
          $scope.permisosPosicion = response.data;
          $scope.getPermissions();
        });
    };
      
    $scope.selectedCompany = {};
    $scope.standardCompany = {};
    $scope.standardSelectCompanies = [
      {id: 1, name: 'Advanzer'},
      {id: 2, name: 'Entuizer'}
    ];
    
    $scope.selectedBoss = {};
    $scope.standardBoss = {};
    $scope.standardSelectBosses = [];
      
    $http.get("admin-theme/modules/user/get_bosses").then(function (response) {
      $scope.standardSelectBosses = response.data;
    });    
  
      
    $scope.getPermissions = function (){
        
        var cont = 9;
        //alert($scope.switches['ps1']);
        while(cont>0){
            var permission = angular.element( document.querySelector( '#ps'+cont ) );
            if($scope.permisosArea['permiso'+cont] || $scope.permisosPosicion['permiso'+cont]){
                //permission.attr('switcher-value',"true");
                permission.addClass('disabled-permission');
                $scope.switches['ps'+cont] = true;
                //document.getElementById('ps'+cont).innerHTML = $scope.valueOn;
            }else{
                //permission.attr('switcher-value',"false");
                permission.removeClass('disabled-permission');
                $scope.switches['ps'+cont] = false;
                //document.getElementById('ps'+cont).innerHTML = $scope.valueOff;
            }
            //document.getElementById('ps'+cont).innerHTML = '<switch id="ps'+cont+'" color="primary" ng-model="switches[ps'+cont+']"></switch>';
            console.log('ps'+cont+" "+$scope.switches['ps'+cont]);
            cont--;
        }
        
    }
    
    $scope.permisosArea = {
        permiso1: false,
        permiso2: false,
        permiso3: false,
        permiso4: false,
        permiso5: false,
        permiso6: false,
        permiso7: false,
        permiso8: false,
        permiso9: false
    };
      
    $scope.permisosPosicion = {
        permiso1: false,
        permiso2: false,
        permiso3: false,
        permiso4: false,
        permiso5: false,
        permiso6: false,
        permiso7: false,
        permiso8: false,
        permiso9: false
    };
    
    //var vm = this;
    /*vm.switches = {
        s1: false,
        s2: false,
        s3: false,
        s4: false,
        s5: false,
        s6: false,
        s7: false,
        s8: false,
        s9: false
    };*/
    //$scope.switcherValue=false;
      
    $scope.switches = {
        ps1: false,
        ps2: false,
        ps3: false,
        ps4: false,
        ps5: false,
        ps6: false,
        ps7: false,
        ps8: false,
        ps9: false
    };
      
    $scope.saveUser = function(){
        var form = "\n Nombre: " + $scope.formUser.inputUserName
                + "\n Apellido Paterno: " + $scope.formUser.inputUserApellidoP
                + "\n Apellido Materno: " + $scope.formUser.inputUserApellidoM
                + "\n Email: " + $scope.formUser.inputUserEmail
                + "\n Plaza: " + $scope.formUser.inputUserPlaza
                + "\n Nomina: " + $scope.formUser.inputUserNomina
                + "\n Fecha Ingreso: " + document.getElementById("inputUserFechaIngreso").value//$scope.formUser.dt
                + "\n Area: " + $scope.selectedArea.selected.name
                + "\n Track: " + $scope.selectedTrack.selected.name
                + "\n Posicion: " + $scope.selectedPosition.selected.name
                + "\n Empresa: " + $scope.selectedCompany.selected.name
                + "\n Jefe: " + $scope.selectedBoss.selected.name
                + "\n Has Picture: " + $scope.formUser.noPicture
                + "\n Foto: " + $scope.formUser.imageSrc;
        
        console.log(form)
    }
   
  /*--------------------------------------------------------------------------------------------*/
      
  }
    
})();