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
    
    $scope.getEmpleadosActivos = function(){
    //function getEmpleadosActivos(){
        return $http.get("admin-theme/modules/user/users_active").then(function (response) {
        //$.getJSON("admin-theme/modules/user/users_active", function( data ) {
            return response.data;
            //$scope.users_table.empleadosActivos = data;
            //$scope.$apply();
        });
    }
    
    $scope.getEmpleadosInactivos = function(){
    //function getEmpleadosInactivos(){
        return $http.get("admin-theme/modules/user/users_deactive").then(function (response) {
        //$.getJSON("admin-theme/modules/user/users_deactive", function( data ) {
            return response.data;
            //$scope.users_table.empleadosInactivos = data;
            //$scope.$apply();
        });
    }
    
    $scope.refreshTables = function(){
        
        $scope.empleadosActivos_loaded = false;
        $scope.empleadosInactivos_loaded = false;
        
        // functions to get users
        $scope.getEmpleadosActivos().then(function(data) {
            $scope.users_table.empleadosActivos = data;
            $scope.users_table.activos = data;
            $scope.empleadosActivos_loaded = true;
        });
        
        //getEmpleadosActivos();
        
        $scope.getEmpleadosInactivos().then(function(data) {
            $scope.users_table.empleadosInactivos = data;
            $scope.users_table.inactivos = data;
            $scope.empleadosInactivos_loaded = false;
        });
        
        //getEmpleadosInactivos();
    }
    
    $scope.users_table = [];
    $scope.requests_table = [];
    $scope.letter_table = [];
    $scope.vacations_table = [];
      
      $scope.empleadosActivos_loaded = false;
      $scope.empleadosInactivos_loaded = false;
    
    $scope.users_table.empleadosActivos = [];
    $scope.users_table.empleadosInactivos = [];
    
    $scope.users_table.tamanioTablaEmpleadosActivos = 10;
    $scope.users_table.tamanioTablaEmpleadosInactivos = 10;
      
    $scope.requests_table.solicitudesPorUsuario = [];
    $scope.letter_table.solicitudesPorUsuario = [];
      
    $scope.requests_table.tamanioTablaSolicitudesPorUsuario = 10;
    $scope.letter_table.tamanioTablaSolicitudesPorUsuario = 10;
    
    $scope.refreshTables();
    /*$timeout(function() {
        $scope.refreshTables();
    }, 2000);*/
    
    $scope.goBack = function (){
        window.history.back();
    };
      
    $scope.cancelAdd = function (){
        resetForm("usuarios.colaboradores_activos");
    };
      
    $scope.deleteUser = function (){
        $scope.formEditUser.inputUserBaja = true;
    };
  
    $scope.cancelDelete = function (){
        $scope.formEditUser.inputUserBaja = false;
    };
      
    $scope.restoreUser = function (){
        $scope.formEditUser.inputUserAlta = true;
    };
  
    $scope.cancelRestore = function (){
        $scope.formEditUser.inputUserAlta = false;
    };
      
    $scope.confirmDelete = function (){
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("u_id", $scope.formEditUser.id); 
        formData.append("u_motivo_baja", document.getElementById("inputMotivoBaja").value);
        formData.append("u_fecha_baja", document.getElementById("inputFechaBaja").value);
        formData.append("u_tipo_baja", $scope.selectedTipoBaja.selected.name);
        
        //console.log(formData);
        //console.log($scope.formEditUser.id+" "+document.getElementById("inputFechaBaja").value+" "+$scope.selectedTipoBaja.selected.name);
        
        $http.post("admin-theme/modules/user/deactive_user", formData,{
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("usuarios.colaboradores_inactivos");
            getAlert('theme/success_modal/Usuario dado de baja correctamente');
            
        })
        .error(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al eliminar usuario');
        });
        
    };
      
    $scope.confirmRestore = function (){
        
        $scope.sending = true;
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append("u_id", $scope.formEditUser.id);
        formData.append("u_fecha_reingreso", document.getElementById("inputFechaReingreso").value);
        
        $http.post("admin-theme/modules/user/reactive_user", formData,{
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            resetForm("usuarios.colaboradores_activos");
            getAlert('theme/success_modal/Usuario dado de alta correctamente');
            
        })
        .error(function (response) {
            console.log(response);
            $scope.refreshTables();
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al eliminar usuario');
        });
        
    };
    
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
            $scope.formEditUser.inputUserFechaBaja = response.data.fecha_baja;
            $scope.formEditUser.inputUserFechaReingreso = response.data.fecha_reingreso;
            $scope.formEditUser.inputUserTipoBaja = response.data.tipo_baja;
            $scope.formEditUser.inputUserArea = response.data.us_area_name;
            $scope.formEditUser.inputUserDireccion = response.data.us_direccion_name;
            $scope.formEditUser.inputUserTrack = response.data.us_track_name;
            $scope.formEditUser.inputUserPosicion = response.data.us_posicion_name;
            $scope.formEditUser.inputUserCompany = response.data.us_company_name;
            $scope.formEditUser.inputUserBoss = response.data.us_boss_name;
            
            // Altas y bajas
            $scope.formEditUser.inputUserStatus = response.data.estado;
            $scope.formEditUser.inputMotivoBaja = response.data.motivo;
            $scope.formEditUser.inputShowMotivo = response.data.estado == 0 ? true : false;
            $scope.formEditUser.inputEliminable = response.data.us_eliminable > 0 ? false: true;
            
            $scope.formEditUser.inputTotalDays = response.data.us_total_days_available;
            
            // Fechas ingreso
            var str = $scope.formEditUser.inputUserFechaIngreso;
            var res = str.split("-");
            $scope.formEditUser.dt = new Date(res[0],res[1],res[2]);
            console.log($scope.formEditUser.inputUserFechaIngreso);
            console.log($scope.formEditUser.dt);
            console.log(res);
            console.log(new Date());
            //document.getElementById("inputUserFechaIngreso").value = str;
            //$("#datepicker").datepicker();
            //$("#fecha").val("My value");
            $scope.formEditUser.fecha = str;
            $scope.formEditUser.editDate = false;
            
            
            $scope.formEditUser.inputUserBaja = false;
            $scope.formEditUser.inputUserAlta = false;
            $scope.formRequest.active_view_request = false;
            $scope.formLetter.active_view_letter = false;
            
            $scope.ue_selectedArea.selected = {id: response.data.us_area_id, name: response.data.us_area_name};
            $scope.ue_selectedTrack.selected = {id: response.data.us_track_id, name: response.data.us_track_name};
            $scope.ue_selectedPosition.selected = {id: response.data.us_posicion_id, name: response.data.us_posicion_name};
            $scope.ue_selectedCompany.selected = {id: response.data.us_company_id, name: response.data.us_company_name};
            $scope.ue_selectedBoss.selected = {id: response.data.us_boss_id, name: response.data.us_boss_name};
            
            var pms = ""+response.data.us_permissions;
            var permisos = pms.split(',');
            
            var pmsu = ""+response.data.us_permissions_user;
            var permisos_user = pmsu.split(',');
            
            console.log(permisos);
            console.log(permisos_user);
            
            $scope.formEditUser.inputUserPermission1 = false;
            $scope.formEditUser.inputUserPermission2 = false;
            $scope.formEditUser.inputUserPermission3 = false;
            $scope.formEditUser.inputUserPermission4 = false;
            $scope.formEditUser.inputUserPermission5 = false;
            $scope.formEditUser.inputUserPermission6 = false;
            $scope.formEditUser.inputUserPermission7 = false;
            $scope.formEditUser.inputUserPermission8 = false;
            $scope.formEditUser.inputUserPermission9 = false;
            
            $scope.formEditUser.permission1 = true;
            $scope.formEditUser.permission2 = true;
            $scope.formEditUser.permission3 = true;
            $scope.formEditUser.permission4 = true;
            $scope.formEditUser.permission5 = true;
            $scope.formEditUser.permission6 = true;
            $scope.formEditUser.permission7 = true;
            $scope.formEditUser.permission8 = true;
            $scope.formEditUser.permission9 = true;
            
            for(var i = 0; i <= permisos.length; i++) {
                switch(permisos[i]){
                       case '1':
                        $scope.formEditUser.inputUserPermission1 = true;
                        $scope.formEditUser.permission1 = false;
                       break;
                       case '2':
                        $scope.formEditUser.inputUserPermission2 = true;
                        $scope.formEditUser.permission2 = false;
                        $http.get("admin-theme/modules/user/users_employed/"+response.data.id).then(function (response) {
                            $scope.personalACargo = response.data;
                        });
                       break;
                       case '3':
                        $scope.formEditUser.inputUserPermission3 = true;
                        $scope.formEditUser.permission3 = false;
                       break;
                       case '4':
                        $scope.formEditUser.inputUserPermission4 = true;
                        $scope.formEditUser.permission4 = false;
                       break;
                       case '5':
                        $scope.formEditUser.inputUserPermission5 = true;
                        $scope.formEditUser.permission5 = false;
                       break;
                       case '6':
                        $scope.formEditUser.inputUserPermission6 = true;
                        $scope.formEditUser.permission6 = false;
                       break;
                       case '7':
                        $scope.formEditUser.inputUserPermission7 = true;
                        $scope.formEditUser.permission7 = false;
                       break;
                       case '8':
                        $scope.formEditUser.inputUserPermission8 = true;
                        $scope.formEditUser.permission8 = false;
                       break;
                       case '9':
                        $scope.formEditUser.inputUserPermission9 = true;
                        $scope.formEditUser.permission9 = false;
                       break;
                }
            }
            
            for(var i = 0; i <= permisos_user.length; i++) {
                switch(permisos_user[i]){
                       case '1':
                        $scope.formEditUser.inputUserPermission1 = true;
                        $scope.formEditUser.permisosUsuario['permiso1'] = true;
                       break;
                       case '2':
                        $scope.formEditUser.inputUserPermission2 = true;
                        
                        $http.get("admin-theme/modules/user/users_employed/"+response.data.id).then(function (response) {
                            $scope.personalACargo = response.data;
                        });
                        
                        $scope.formEditUser.permisosUsuario['permiso2'] = true
                       break;
                       case '3':
                        $scope.formEditUser.inputUserPermission3 = true;
                        $scope.formEditUser.permisosUsuario['permiso3'] = true
                       break;
                       case '4':
                        $scope.formEditUser.inputUserPermission4 = true;
                        $scope.formEditUser.permisosUsuario['permiso4'] = true
                       break;
                       case '5':
                        $scope.formEditUser.inputUserPermission5 = true;
                        $scope.formEditUser.permisosUsuario['permiso5'] = true
                       break;
                       case '6':
                        $scope.formEditUser.inputUserPermission6 = true;
                        $scope.formEditUser.permisosUsuario['permiso7'] = true
                       break;
                       case '7':
                        $scope.formEditUser.inputUserPermission7 = true;
                        $scope.formEditUser.permisosUsuario['permiso7'] = true
                       break;
                       case '8':
                        $scope.formEditUser.inputUserPermission8 = true;
                        $scope.formEditUser.permisosUsuario['permiso8'] = true
                       break;
                       case '9':
                        $scope.formEditUser.inputUserPermission9 = true;
                        $scope.formEditUser.permisosUsuario['permiso9'] = true
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
        
        $.getJSON("admin-theme/modules/request/get_all_letter_by_user/"+id_user, function( data ) {
            $scope.letter_table.tamanioTablaSolicitudesPorUsuario = 10;
            $scope.letter_table.solicitudesPorUsuario = data;
            //console.log(data);
            $scope.$apply();
        });
        
        /*$.getJSON("admin-theme/modules/vacations/list_days_by_user/"+id_user, function( data ) {
            $scope.vacations_table.vacations_days = data;
            //console.log(data);
            $scope.$apply();
        });*/
        
        $.getJSON("admin-theme/modules/vacations/list_days_vacations_by_user/"+id_user, function( data ) {
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
            
            $scope.formRequest.active_view_request = true;
            $scope.formRequest.requestStatus = true;
            
            
            //$scope.refreshTables();
            //$state.go('solicitudes.detalle_autorizar');
            getAditionaInformation($scope.formEditUser.id);
            //$scope.formRequest.active_view_request = true;
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
    
  /* Show formLetter by User ------------------------------------------------------------------------------------*/
    
    $scope.formLetter = {};
    
    $scope.formLetter.active_view_letter = false;
    
    $scope.showLetter = function (id){
        
        $http.get("admin-theme/modules/request/get_letter/"+id).then(function (response) {
            //console.log(response.data);
            
            $scope.formLetter.inputLetterId = response.data.id;
            $scope.formLetter.inputLetterColaborador = response.data.colaborador;
            $scope.formLetter.inputLetterDirigidoA = response.data.dirigido;
            $scope.formLetter.inputLetterSueldo = response.data.sueldo;
            $scope.formLetter.inputLetterIMSS = response.data.imss;
            $scope.formLetter.inputLetterRFC = response.data.rfc;
            $scope.formLetter.inputLetterCURP = response.data.curp;
            $scope.formLetter.inputLetterAntiguedad = response.data.antiguedad;
            $scope.formLetter.inputLetterPuesto = response.data.puesto;
            $scope.formLetter.inputLetterDomicilio = response.data.domicilio;
            $scope.formLetter.inputLetterObservaciones = response.data.observaciones;
            
            getAditionaInformation($scope.formEditUser.id);
            $scope.formLetter.active_view_letter = true;
        });
        
    }
    
    $scope.returnLetterByUser = function() {

        $scope.formLetter.active_view_letter = false;
        
    };
      
  /*--------------------------------------------------------------------------------------------------*/
      
  /* New user ----------------------------------------------------------------------------------*/
    
    $scope.formUser={};
      
    //$scope.formUser.imageSrc = "";
    
    $scope.formUser.imageSrc = $filter('profilePicture')('picture');
    
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');//$filter('profilePicture')('picture');
    //$scope.imageSrc = $filter('appImage')('theme/no-photo.png');
    
    //$scope.formUser.noPicture = false;
    $scope.formUser.noPicture = true;
      
    $scope.removePicture = function () {
      //$scope.formUser.imageSrc = '';//$filter('appImage')('theme/no-photo.png');
        $scope.formUser.imageSrc = $filter('profilePicture')('picture');
      $scope.formUser.noPicture = true;
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
        /*while(cont>0){
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
        }*/
        
        while(cont>0){
            
            var valor_input = false;
            var habilitado = true;
            
            var permission = angular.element( document.querySelector( '#ps'+cont ) );
            
            if($scope.permisosArea['permiso'+cont] || $scope.permisosPosicion['permiso'+cont]){
                    valor_input = true;
                    habilitado = false;
            }
            
            switch(cont){
                case 1:
                    $scope.formUser.inputUserPermission1 = valor_input;
                    $scope.formUser.permission1 = habilitado;
                break;
                case 2:
                    $scope.formUser.inputUserPermission2 = valor_input;
                    $scope.formUser.permission2 = habilitado;
                break;
                case 3:
                    $scope.formUser.inputUserPermission3 = valor_input;
                    $scope.formUser.permission3 = habilitado;
                break;
                case 4:
                    $scope.formUser.inputUserPermission4 = valor_input;
                    $scope.formUser.permission4 = habilitado;
                break;
                case 5:
                    $scope.formUser.inputUserPermission5 = valor_input;
                    $scope.formUser.permission5 = habilitado;
                break;
                case 6:
                    $scope.formUser.inputUserPermission6 = valor_input;
                    $scope.formUser.permission6 = habilitado;
                break;
                case 7:
                    $scope.formUser.inputUserPermission7 = valor_input;
                    $scope.formUser.permission7 = habilitado;
                break;
                case 8:
                    $scope.formUser.inputUserPermission8 = valor_input;
                    $scope.formUser.permission8 = habilitado;
                break;
                case 9:
                    $scope.formUser.inputUserPermission9 = valor_input;
                    $scope.formUser.permission9 = habilitado;
                break;
                       
            }
            
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
        
        //var cont = 9;
        var permisosSeleccionados = "";
        
        //console.log("Permiso | Disponible | Habilitado");
        
        /*while(cont>0){
            
            console.log('ps'+cont+'   '+$scope.permissionsAvailable['ps'+cont]+'   '+$scope.switches['ps'+cont]);
            
            if($scope.permissionsAvailable['ps'+cont] && $scope.switches['ps'+cont]){
                permisosSeleccionados += 'ps'+cont+",";
            }
           
            cont--;
        }*/
        
        if($scope.formUser.inputUserPermission1 && $scope.formUser.permission1){
           permisosSeleccionados += 'ps'+1+",";
        }
        if($scope.formUser.inputUserPermission2 && $scope.formUser.permission2){
           permisosSeleccionados += 'ps'+2+",";
        }
        if($scope.formUser.inputUserPermission3 && $scope.formUser.permission3){
           permisosSeleccionados += 'ps'+3+",";
        }
        if($scope.formUser.inputUserPermission4 && $scope.formUser.permission4){
           permisosSeleccionados += 'ps'+4+",";
        }
        if($scope.formUser.inputUserPermission5 && $scope.formUser.permission5){
           permisosSeleccionados += 'ps'+5+",";
        }
        if($scope.formUser.inputUserPermission6 && $scope.formUser.permission6){
           permisosSeleccionados += ''+6+",";
        }
        if($scope.formUser.inputUserPermission7 && $scope.formUser.permission7){
           permisosSeleccionados += 'ps'+7+",";
        }
        if($scope.formUser.inputUserPermission8 && $scope.formUser.permission8){
           permisosSeleccionados += 'ps'+8+",";
        }
        if($scope.formUser.inputUserPermission9 && $scope.formUser.permission9){
           permisosSeleccionados += 'ps'+9+",";
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
            resetForm("usuarios.colaboradores_activos");
            
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
    
    $scope.selectedTipoBaja = {};
    //$scope.selectedArea.selected = "";
    $scope.standardTipoBaja = {};
    $scope.standardSelectTiposBajas = [
        {id:1, name:"Voluntaria"},
        {id:2, name:"Involuntaria"}
    ];
      
    //$("#fecha").datepicker();
    //$("#fecha").datepick({dateFormat: 'yyyy-mm-dd'});
      
    $scope.formEditUser.editDate = false;
      
    $scope.editDate = function(){
        $scope.formEditUser.editDate = true;
    }
    
    $scope.cancelEditDate = function(){
        $scope.formEditUser.editDate = false;
    }
      
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
          $scope.formEditUser.permisosArea = response.data;
          $scope.formEditUser.getPermissions();
        });
    };
      
    $scope.formEditUser.getPositions = function (item, model){
        $http.get("admin-theme/modules/position/posiciones_activas_por_track/"+model.id).then(function (response) {
          $scope.ue_standardSelectPositions = response.data;
        });
    };
      
    $scope.formEditUser.getPermissionsPositions = function (item, model){
        // Get permissions by area
        $http.get("admin-theme/modules/permission/permisos_por_posicion/"+model.id).then(function (response) {
          $scope.formEditUser.permisosPosicion = response.data;
          $scope.formEditUser.getPermissions();
        });
    }
    
    $scope.formEditUser.getPermissions = function (){
        
        var cont = 9;
        
        while(cont>0){
            
            var valor_input = false;
            var habilitado = true;
            
            //var permission = angular.element( document.querySelector( '#ps'+cont ) );
            
            if($scope.formEditUser.permisosArea['permiso'+cont] || $scope.formEditUser.permisosPosicion['permiso'+cont]){
                    valor_input = true;
                    habilitado = false;
            }/*else if($scope.formEditUser.permisosUsuario['permiso'+cont]){
                    valor_input = true;
                    habilitado = true; 
            }*/
            
            switch(cont){
                case 1:
                    $scope.formEditUser.inputUserPermission1 = valor_input;
                    $scope.formEditUser.permission1 = habilitado;
                break;
                case 2:
                    $scope.formEditUser.inputUserPermission2 = valor_input;
                    $scope.formEditUser.permission2 = habilitado;
                break;
                case 3:
                    $scope.formEditUser.inputUserPermission3 = valor_input;
                    $scope.formEditUser.permission3 = habilitado;
                break;
                case 4:
                    $scope.formEditUser.inputUserPermission4 = valor_input;
                    $scope.formEditUser.permission4 = habilitado;
                break;
                case 5:
                    $scope.formEditUser.inputUserPermission5 = valor_input;
                    $scope.formEditUser.permission5 = habilitado;
                break;
                case 6:
                    $scope.formEditUser.inputUserPermission6 = valor_input;
                    $scope.formEditUser.permission6 = habilitado;
                break;
                case 7:
                    $scope.formEditUser.inputUserPermission7 = valor_input;
                    $scope.formEditUser.permission7 = habilitado;
                break;
                case 8:
                    $scope.formEditUser.inputUserPermission8 = valor_input;
                    $scope.formEditUser.permission8 = habilitado;
                break;
                case 9:
                    $scope.formEditUser.inputUserPermission9 = valor_input;
                    $scope.formEditUser.permission9 = habilitado;
                break;
                       
            }
            
           cont--;
        }
        
    }
    
    $scope.formEditUser.permisosArea = {
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
      
    $scope.formEditUser.permisosPosicion = {
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
      
    $scope.formEditUser.permisosUsuario = {
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
     
    $scope.formEditUser.resetPassword = function (){
        
    };
    
    $scope.formEditUser.enableEdit = function (){
        $scope.formEditUser.editUser = true;
    };
      
    /*$scope.formEditUser.returnTable = function (){
        resetForm("usuarios.colaboradores_activos");
    };*/
      
    $scope.formEditUser.cancelEdit = function (){
        $scope.formEditUser.editUser = false;
    };
      
    $scope.formEditUser.updateUser = function (){
        
        $scope.sending = true;
        
        // Permisos
        var permisos = "";
        
        /*console.log($scope.formEditUser.permission1+" "+$scope.formEditUser.permission2+" "+$scope.formEditUser.permission3+" "+$scope.formEditUser.permission4+" "+$scope.formEditUser.permission5+" "+$scope.formEditUser.permission6+" "+$scope.formEditUser.permission7+" "+$scope.formEditUser.permission8+" "+$scope.formEditUser.permission9);*/
        
        if($scope.formEditUser.inputUserPermission1 && $scope.formEditUser.permission1){
            permisos += "1-"; 
        }
        if($scope.formEditUser.inputUserPermission2 && $scope.formEditUser.permission2){
            permisos += "2-"; 
        }
        if($scope.formEditUser.inputUserPermission3 && $scope.formEditUser.permission3){
            permisos += "3-";  
        }
        if($scope.formEditUser.inputUserPermission4 && $scope.formEditUser.permission4){
            permisos += "4-"; 
        }
        if($scope.formEditUser.inputUserPermission5 && $scope.formEditUser.permission5){
            permisos += "5-"; 
        }
        if($scope.formEditUser.inputUserPermission6 && $scope.formEditUser.permission6){
            permisos += "6-"; 
        }
        if($scope.formEditUser.inputUserPermission7 && $scope.formEditUser.permission7){
            permisos += "7-"; 
        }
        if($scope.formEditUser.inputUserPermission8 && $scope.formEditUser.permission8){
            permisos += "8-"; 
        }
        if($scope.formEditUser.inputUserPermission9 && $scope.formEditUser.permission9){
            permisos += "9-"; 
        }
        
        var formData = new FormData();
        
        formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        formData.append("uu_id", $scope.formEditUser.id);
        
        formData.append("uu_foto", document.getElementById("uploadFile").files[0]);
        
        formData.append("uu_nombre", $scope.formEditUser.inputUserName); 
        formData.append("uu_apellido_paterno", $scope.formEditUser.inputUserApellidoP); 
        formData.append("uu_apellido_materno", $scope.formEditUser.inputUserApellidoM);
        
        formData.append("uu_email", $scope.formEditUser.inputUserEmail); 
        formData.append("uu_plaza", $scope.formEditUser.inputUserPlaza); 
        formData.append("uu_nomina", $scope.formEditUser.inputUserNomina); 
        
        //$scope.formEditUser.editDate = false;
        
        if($scope.formEditUser.editDate){
            formData.append("uu_fecha_ingreso", document.getElementById("inputUserFechaIngreso").value);
        }else{
            formData.append("uu_fecha_ingreso", $scope.formEditUser.inputUserFechaIngreso);
        }
        
        formData.append("uu_area", $scope.ue_selectedArea.selected.id); 
        formData.append("uu_track", $scope.ue_selectedTrack.selected.id); 
        formData.append("uu_posicion", $scope.ue_selectedPosition.selected.id); 
        formData.append("uu_empresa", $scope.ue_selectedCompany.selected.id);
        formData.append("uu_boss", $scope.ue_selectedBoss.selected.id);
        
        formData.append("uu_permisos", permisos);
        
        $http.post('admin-theme/modules/user/update_user', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function (response) {
            //alert('sent OK');
            console.log(response);
            $scope.sending = false;
            $scope.refreshTables();
            getAlert('theme/success_modal/Usuario actualizado correctamente');
            resetForm("usuarios.colaboradores_activos");
            
        })
        .error(function (response) {
            //alert('error sending.');
            console.log(response);
            $scope.sending = false;
            getAlert('theme/danger_modal/Falla al actaulizar el usuario');
        });
    };
  
  /*--------------------------------------------------------------------------------------------*/
      
  }
    
})();