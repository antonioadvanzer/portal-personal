/**
 * @author Antonio Baez
 * created on 12.05.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.admin_modules.usuarios')
      .controller('UsuariosModuleCtrl', UsuariosModuleCtrl);

  /** @ngInject */
  function UsuariosModuleCtrl($scope, $http, $filter, fileReader, $window, $location, $state, $uibModal, $timeout, editableOptions, editableThemes) {
  
      var vm = this;
      
  /* Users table -------------------------------------------------------------------------------*/
    
    //$scope.getEmpleadosActivos = function(){
    function getEmpleadosActivos(){
        //return $http.get("admin-theme/modules/user/users_active").then(function (response) {
        $.getJSON("admin-theme/modules/user/users_active", function( data ) {
            //return response.data;
            $scope.users_table.empleadosActivos = data;
            $scope.$apply();
        });
    }
    
    //$scope.getEmpleadosInactivos = function(){
    function getEmpleadosInactivos(){
        //return $http.get("admin-theme/modules/user/users_deactive").then(function (response) {
        $.getJSON("admin-theme/modules/user/users_deactive", function( data ) {
            //return response.data;
            $scope.users_table.empleadosInactivos = data;
            $scope.$apply();
        });
    }
    
    $scope.refreshTables = function(){
        // functions to get users
        /*$scope.getEmpleadosActivos().then(function(data) {
            $scope.users_table.empleadosActivos = data;
        });*/
        
        getEmpleadosActivos();
        
        /*$scope.getEmpleadosInactivos().then(function(data) {
            $scope.users_table.empleadosInactivos = data;
        });*/
        
        getEmpleadosInactivos();
    }
    
    $scope.users_table = [];
    $scope.requests_table = [];
    $scope.vacations_table = [];
    
    $scope.users_table.tamanioTablaEmpleadosActivos = 10;
    $scope.users_table.tamanioTablaEmpleadosIactivos = 10;
    
    $scope.users_table.empleadosActivos = [];
    $scope.users_table.empleadosInactivos = [];
    
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
    
    $scope.showUser = function (id){

        $http.get("admin-theme/modules/user/get_user/"+id).then(function (response) {
            
            console.log(response.data);
            
            $http.get("admin-theme/modules/area/areas_activas").then(function (response) {
              $scope.ue_standardSelectAreas = response.data;
            });
            
            $http.get("admin-theme/modules/track/tracks_activos").then(function (response) {
              $scope.ue_standardSelectTracks = response.data;
            });
            
            $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+response.data.us_track_id).then(function (response) {
              $scope.ue_standardSelectPositions = response.data;
            });
            
            $scope.ue_standardSelectCompanies = [
              {id: 1, name: 'Advanzer'},
              {id: 2, name: 'Entuizer'}
            ];
            
            $http.get("admin-theme/modules/user/get_bosses").then(function (response) {
              $scope.ue_standardSelectBosses = response.data;
            }); 
            
            $scope.formEditUser.editUser = false;
            $scope.formEditUser.noPicture = true;
            
            $scope.formEditUser.id = response.data.id;
            //$scope.formUser.imageSrc = response.data.photo;
            $scope.formEditUser.imageSrc = $filter('profilePicture')(response.data.us_image,response.data.us_ext);
            $scope.formEditUser.imageProfile = $filter('profilePicture')(response.data.us_image,response.data.us_ext);
            $scope.formEditUser.inputUserName = response.data.name;
            $scope.formEditUser.inputUserApellidoP = response.data.apellido_paterno;
            $scope.formEditUser.inputUserApellidoM = response.data.apellido_materno;
            $scope.formEditUser.inputUserEmail = response.data.email;
            $scope.formEditUser.inputUserPlaza = response.data.plaza;
            $scope.formEditUser.inputUserNomina = response.data.nomina;
            $scope.formEditUser.inputUserFechaIngreso = response.data.fecha_ingreso;
            $scope.formEditUser.inputUserArea = response.data.us_area_name;
            $scope.formEditUser.inputUserDireccion = response.data.us_direccion_name;
            $scope.formEditUser.inputUserTrack = response.data.us_track_name;
            $scope.formEditUser.inputUserPosicion = response.data.us_posicion_name;
            $scope.formEditUser.inputUserCompany = response.data.us_company_name;
            $scope.formEditUser.inputUserBoss = response.data.us_boss_name;
            
            $scope.ue_selectedArea.selected = {id: response.data.us_area_id, name: response.data.us_area_name};
            $scope.ue_selectedTrack.selected = {id: response.data.us_track_id, name: response.data.us_track_name};
            $scope.ue_selectedPosition.selected = {id: response.data.us_posicion_id, name: response.data.us_posicion_name};
            $scope.ue_selectedCompany.selected = {id: response.data.us_company_id, name: response.data.us_company_name};
            $scope.ue_selectedBoss.selected = {id: response.data.us_boss_id, name: response.data.us_boss_name};
            
            var pms = ""+response.data.us_permissions;
            var permisos = pms.split(',');
            
            console.log(permisos);
            
            $scope.formEditUser.inputUserPermission1 = false;
            $scope.formEditUser.inputUserPermission2 = false;
            $scope.formEditUser.inputUserPermission3 = false;
            $scope.formEditUser.inputUserPermission4 = false;
            $scope.formEditUser.inputUserPermission5 = false;
            $scope.formEditUser.inputUserPermission6 = false;
            $scope.formEditUser.inputUserPermission7 = false;
            $scope.formEditUser.inputUserPermission8 = false;
            $scope.formEditUser.inputUserPermission9 = false;
            
            for(var i = 0; i <= permisos.length; i++) {
                switch(permisos[i]){
                       case '1':
                        $scope.formEditUser.inputUserPermission1 = true;
                        $("#inputUserPermission1").prop('disabled', 'disabled');
                       break;
                       case '2':
                        $scope.formEditUser.inputUserPermission2 = true;
                        $("#inputUserPermission2").prop('disabled', 'disabled');
                        $http.get("admin-theme/modules/user/users_employed/"+response.data.id).then(function (response) {
                            $scope.personalACargo = response.data;
                        });
                       break;
                       case '3':
                        $scope.formEditUser.inputUserPermission3 = true;
                        $("#inputUserPermission3").prop('disabled', 'disabled');
                       break;
                       case '4':
                        $scope.formEditUser.inputUserPermission4 = true;
                        $("#inputUserPermission4").prop('disabled', 'disabled');
                       break;
                       case '5':
                        $scope.formEditUser.inputUserPermission5 = true;
                        $("#inputUserPermission5").prop('disabled', 'disabled');
                       break;
                       case '6':
                        $scope.formEditUser.inputUserPermission6 = true;
                        $("#inputUserPermission6").prop('disabled', 'disabled');
                       break;
                       case '7':
                        $scope.formEditUser.inputUserPermission7 = true;
                        $("#inputUserPermission7").prop('disabled', 'disabled');
                       break;
                       case '8':
                        $scope.formEditUser.inputUserPermission8 = true;
                        $("#inputUserPermission8").prop('disabled', 'disabled');
                       break;
                       case '9':
                        $scope.formEditUser.inputUserPermission9 = true;
                        $("#inputUserPermission9").prop('disabled', 'disabled');
                       break;
                }
            }
            
            
            $scope.refreshTables();
            $state.go('usuarios.usuario_detalle');
        });
        
        //$scope.requests_table = [];
        //$scope.requests_table.tamanioTablaSolicitudesPorUsuario = 10;
        //$scope.requests_table.solicitudesPorUsuario = [];

        /*$http.get("admin-theme/modules/request/get_all_requests_by_user/"+id).success(function (data) {
            
            $scope.requests_table.tamanioTablaSolicitudesPorUsuario = 5;
            $scope.requests_table.solicitudesPorUsuario = data;
            
            console.log(data);
        });*/
        
        getAditionaInformation(id);
    }
    
    function getAditionaInformation(id_user){
        $.getJSON("admin-theme/modules/request/get_all_requests_by_user/"+id_user, function( data ) {
            $scope.requests_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.requests_table.solicitudesPorUsuario = data;
            //console.log(data);
            $scope.$apply();
        });
        
        $.getJSON("admin-theme/modules/vacations/list_days_by_user/"+id_user, function( data ) {
            $scope.vacations_table.vacations_days = data;
            //console.log(data);
            $scope.$apply();
        });
    }
      
  /*--------------------------------------------------------------------------------------------*/
    
  /* Show formRequest by User ------------------------------------------------------------------------------------*/
    
    $scope.formRequest = {};
      
    $scope.formRequest.active_view_request = false;
      
    $scope.showRequest = function (id){
        
        $http.get("admin-theme/modules/request/get_request/"+id).then(function (response) {
          //console.log(response.data);
            $scope.formRequest.inputRequestId = response.data.id;
            $scope.formRequest.inputRequestColaborador = response.data.nombre_colaborador;
            $scope.formRequest.inputRequestAutorizador = response.data.nombre_autorizador;
            $scope.formRequest.inputRequestDias = response.data.dias;
            $scope.formRequest.inputRequestEstado = response.data.estado;
            $scope.formRequest.inputRequestTipo = response.data.tipo;
            $scope.formRequest.inputRequestMotivo = response.data.motivo;
            $scope.formRequest.inputRequestDesde = response.data.desde;
            $scope.formRequest.inputRequestHasta = response.data.hasta;
            $scope.formRequest.inputRequestRegresa = response.data.regresa;
            $scope.formRequest.inputRequestObservationes = response.data.observaciones;
            $scope.formRequest.inputRequestAuthBoss = response.data.aut_jefe;
            $scope.formRequest.inputRequestAuthCh = response.data.aut_ch;
            
            $scope.formRequest.inputRequestMotivoCancelacion = response.data.razon_cancelacion;
            $scope.formRequest.inputRequestOcacion = response.data.ocacion;
            
            $scope.formRequest.labelRequestStatus = response.data.status;
            $scope.formRequest.labelRequestType = response.data.type;
            
            $scope.formRequest.requestStatus = true;
            
            
            //$scope.refreshTables();
            //$state.go('solicitudes.detalle_autorizar');
            getAditionaInformation($scope.formEditUser.id);
            $scope.formRequest.active_view_request = true;
        });
        
    }
    
    $scope.getComprobante = function(){
        
        getAlert('theme/modules/absence/comprobante_medico/'+$scope.formRequest.inputRequestId);
    }
      
    $scope.rejectRequest = function() {
        
        $scope.formRequest.requestStatus = false;
        
    };
      
    $scope.cancelRejectRequest = function() {

        $scope.formRequest.requestStatus = true;
        
    };
      
    $scope.returnRequestByUser = function() {

        $scope.formRequest.active_view_request = false;
        
    };
      
    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
      
    $scope.authRequest = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/request/auth_request/"+$scope.formRequest.inputRequestId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            //resetForm("solicitudes.toda_las_solicitudes");
            getAditionaInformation($scope.formEditUser.id);
            $scope.formRequest.active_view_request = false;
            getAlert('theme/success_modal/Solicitud aprobada correctamente');
        });
        
    };
   
    $scope.sendRejectRequest = function (){
        
        console.log("Enviando solicitud...");
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("r_id", $scope.formRequest.inputRequestId); 
        formData.append("r_motivo_cancelacion", document.getElementById("inputRequestMotivoCancelacion").value); 
        
        $http.post('admin-theme/modules/request/reject_request', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.refreshTables();
            //resetForm("solicitudes.toda_las_solicitudes");
            getAditionaInformation($scope.formEditUser.id);
            $scope.formRequest.active_view_request = false;
            $scope.sending = false;
            getAlert('theme/success_modal/Solicitud rechazada correctamente');
            
        })
        .error(function (response) {
            console.log(response);
            //$scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al rechazar la solicitud');
        });
        
    }
    
    $scope.cancelRequest = function (){
        
        $scope.sending = true;
        
        $http.get("admin-theme/modules/request/cancel_request/"+$scope.formRequest.inputRequestId).then(function (response) {
            console.log(response.data);
            $scope.sending = false;
            $scope.refreshTables();
            //resetForm("solicitudes.toda_las_solicitudes");
            getAditionaInformation($scope.formEditUser.id);
            $scope.formRequest.active_view_request = false;
            getAlert('theme/success_modal/Solicitud cancelada correctamente');
        });
        
    }
      
  /*--------------------------------------------------------------------------------------------------*/
      
  /* New user ----------------------------------------------------------------------------------*/
    
    $scope.formUser={};
      
    $scope.formUser.imageSrc = "";      
    
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');//$filter('profilePicture')('picture');
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');
    $scope.formUser.noPicture = false;
      
    $scope.removePicture = function () {
      $scope.formUser.imageSrc = '';//$filter('appImage')('theme/no-photo.png');
      $scope.formUser.noPicture = false;
    };

    $scope.uploadPicture = function () {
      var fileInput = document.getElementById('uploadFile');
        $scope.formUser.noPicture = true;
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
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'yyyy-MM-dd', 'shortDate'];
    $scope.format = $scope.formats[3];
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
      
    $scope.formUser.nomina_available = false;
    
    // Check if nomina exists
    $scope.formUser.checkNomina = function (form){
        
        if(!form.inputUserNomina.$invalid){
            
            $http.get("admin-theme/modules/user/exists_nomina/"+$scope.formUser.inputUserNomina).then(function (response) {
              $scope.formUser.nomina_available = response.data == 1 ? true : false;
            });
            
        }else{
            $scope.formUser.nomina_available = false;
        }
        
    };
      
    $scope.formUser.email_available = false;
    
    // Chek if email address exists
    $scope.formUser.checkEmail = function (form){
        
        if(!form.inputUserEmail.$invalid){
            
            $http.get("admin-theme/modules/user/exists_email/"+$scope.formUser.inputUserEmail).then(function (response) {
              $scope.formUser.email_available = response.data == 1 ? true : false;
            });
            
        }else{
            $scope.formUser.email_available = false;
        }
        
    };
      
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
        
        $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+model.id).then(function (response) {
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
                //$scope.switches['ps'+cont] = false;
                $scope.permissionsAvailable['ps'+cont] = false;
                //document.getElementById('ps'+cont).innerHTML = $scope.valueOn;
            }else{
                //permission.attr('switcher-value',"false");
                permission.removeClass('disabled-permission');
                //$scope.switches['ps'+cont] = true;
                $scope.permissionsAvailable['ps'+cont] = true;
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
     // {enabled:false,selected:false}
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
      
    $scope.permissionsAvailable = {
        ps1: true,
        ps2: true,
        ps3: true,
        ps4: true,
        ps5: true,
        ps6: true,
        ps7: true,
        ps8: true,
        ps9: true
    };
      
    $scope.saveUser = function(){
        
        var cont = 9;
        var permisosSeleccionados = "";
        
        console.log("Permiso | Disponible | Habilitado");
        
        while(cont>0){
            
            console.log('ps'+cont+'   '+$scope.permissionsAvailable['ps'+cont]+'   '+$scope.switches['ps'+cont]);
            
            if($scope.permissionsAvailable['ps'+cont] && $scope.switches['ps'+cont]){
                permisosSeleccionados += 'ps'+cont+",";
            }
            cont--;
        }
        
        console.log(permisosSeleccionados);
        
        /*var form = "\n Nombre: " + $scope.formUser.inputUserName
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
                + "\n Permisos" + $scope.switches
                + "\n Foto: " + $scope.formUser.imageSrc;
                
        
        console.log(form)*/
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("nu_foto", document.getElementById("uploadFile").files[0]);
        
        formData.append("nu_nombre", $scope.formUser.inputUserName); 
        formData.append("nu_apellido_paterno", $scope.formUser.inputUserApellidoP); 
        formData.append("nu_apellido_materno", $scope.formUser.inputUserApellidoM);
        
        formData.append("nu_email", $scope.formUser.inputUserEmail); 
        formData.append("nu_plaza", $scope.formUser.inputUserPlaza); 
        formData.append("nu_nomina", $scope.formUser.inputUserNomina); 
        formData.append("nu_fecha_ingreso", document.getElementById("inputUserFechaIngreso").value);
        
        formData.append("nu_area", $scope.selectedArea.selected.id); 
        formData.append("nu_track", $scope.selectedTrack.selected.id); 
        formData.append("nu_posicion", $scope.selectedPosition.selected.id); 
        formData.append("nu_empresa", $scope.selectedCompany.selected.id);
        formData.append("nu_boss", $scope.selectedBoss.selected.id);
        
        formData.append("nu_permisos", permisosSeleccionados);
        
        $http.post('admin-theme/modules/user/save_new_user', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Usuario agregado correctamente');
            resetForm("usuarios.agregar");
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al guardar el usuario');
        });
        
    }
    
    function resetForm(stateName) {
        if ($state.is(stateName)) {
            $state.reload();
        } else {
            $state.go(stateName);
        }
    }
      
    function getAlert(page, size){
        $uibModal.open({
            animation: true,
            templateUrl: page,
            size: size,
            resolve: {
              /*items: function () {
                return $scope.items;
              }*/
            }
        });
    }
      
    $scope.progressFunction = function() {
        return $timeout(function() {}, 3000);
    };
   
  /*--------------------------------------------------------------------------------------------*/
  
  /* Show user ----------------------------------------------------------------------------------*/
    
      $scope.formEditUser = {};
      
      $scope.formEditUser.editUser = false;
  
  /*--------------------------------------------------------------------------------------------*/

  /* Update user ----------------------------------------------------------------------------------*/
        
    $scope.ue_selectedArea = {};
    //$scope.ue_selectedArea.selected = {id:"asd", name:"asd"};
    $scope.ue_standardArea = {};
    $scope.ue_standardSelectAreas = [];
      
    $scope.ue_selectedTrack = {};
    //$scope.ue_selectedTrack.selected = {id:"asd", name:"asd"};
    $scope.ue_standardTrack = {};
    $scope.ue_standardSelectAreas = [];
      
    $scope.ue_selectedPosition = {};
    //$scope.ue_selectedPosition.selected = {id:"asd", name:"asd"};
    $scope.ue_standardPosition = {};
    $scope.ue_standardSelectPositions = [];
      
    $scope.ue_selectedCompany = {};
    //$scope.ue_selectedCompany.selected = {id:"asd", name:"asd"};
    $scope.ue_standardCompany = {};
    $scope.ue_standardSelectCompanies = [];
      
    $scope.ue_selectedBoss = {};
    //$scope.ue_selectedBoss.selected = {id:"asd", name:"asd"};
    $scope.ue_standardBoss = {};
    $scope.ue_standardSelectBosses = [];
    
      
    $scope.formEditUser.imageSrc = "";      
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');//$filter('profilePicture')('picture');
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');
    $scope.formEditUser.noPicture = false;
      
    $scope.formEditUser.removePicture = function () {
      $scope.formEditUser.imageSrc = '';//$filter('appImage')('theme/no-photo.png');
      $scope.formEditUser.noPicture = false;
    };

    $scope.formEditUser.uploadPicture = function () {
      var fileInput = document.getElementById('uploadFile');
        $scope.formEditUser.noPicture = true;
      fileInput.click();
    };
    
    $scope.formEditUser.dt = new Date();
    /*$scope.open = open;
    $scope.opened = false;
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'yyyy-MM-dd', 'shortDate'];
    $scope.format = $scope.formats[3];
    $scope.options = {
        dateDisabled: disabled,
        showWeeks: false
    };*/

    /*function open() {
        $scope.opened = true;
    }
      
    function disabled(data) {
        var date = data.date,
        mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
    }*/
      
    //$scope.switches = [true, true, false, true, true, false];
      
    //$scope.disabled = undefined;
    
    /*$scope.formEditUser.selectedArea = {};
    $scope.formEditUser.standardArea = {};
    $scope.formEditUser.standardSelectAreas = [];*/
    
    /*$scope.formEditUser.getAreas = function (){
        $http.get("admin-theme/modules/area/areas_activas").then(function (response) {
          $scope.formEditUser.standardSelectAreas = response.data;
        });
    };*/
    
    $scope.formEditUser.getDirection = function (item, model){
        
        $http.get("admin-theme/modules/direction/direccion_por_area/"+model.id).then(function (response) {
          $scope.formEditUser.inputUserDireccion = response.data.name;
        });
        
        // Get permissions by area
        $http.get("admin-theme/modules/permission/permisos_por_area/"+model.id).then(function (response) {
          $scope.permisosArea = response.data;
          $scope.getPermissions();
        });
    };
      
    $scope.formEditUser.getPositions = function (item, model){
        $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+model.id).then(function (response) {
          $scope.ue_standardSelectPositions = response.data;
        });
    };
     
    $scope.formEditUser.resetPassword = function (){
        
    };
    
    $scope.formEditUser.enableEdit = function (){
        $scope.formEditUser.editUser = true;
    };
      
    $scope.formEditUser.returnTable = function (){
        resetForm("usuarios.colaboradores_activos");
    };
      
    $scope.formEditUser.cancelEdit = function (){
        $scope.formEditUser.editUser = false;
    };
      
    $scope.formEditUser.updateUser = function (){
        
    };
  
  /*--------------------------------------------------------------------------------------------*/
      
  }
    
})();