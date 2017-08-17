/**
 * @author v.lugovsky
 * created on 16.12.2015
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.profile')
    .controller('ProfilePageCtrl', ProfilePageCtrl);

  /** @ngInject */
  function ProfilePageCtrl($scope, $http, fileReader, $filter, $uibModal) {
    
    $scope.personalACargo = [];
      
    $http.get("theme/modules/user/users_employed/"+$scope.user.id).then(function (response) {
        $scope.personalACargo = response.data;
    });
    
  }

})();
