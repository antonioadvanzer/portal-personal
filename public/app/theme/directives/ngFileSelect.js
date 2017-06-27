(function () {
  'use strict';

  angular.module('PortalPersonal.theme')
      .directive('ngFileSelect', ngFileSelect);

  /** @ngInject */
  function ngFileSelect(fileReader, $timeout) {
    /*return {
      link: function ($scope, el) {
        el.bind('change', function (e) {
          $scope.file = (e.srcElement || e.target).files[0];
          $scope.getFile();
        })
      }
    }*/
      return {
      scope: {
        ngModel: '='
      },
      link: function($scope, el) {
        function getFile(file) {
          fileReader.readAsDataUrl(file, $scope)
            .then(function(result) {
              $timeout(function() {
                $scope.ngModel = result;
              });
            });
        }

        el.bind("change", function(e) {
          var file = (e.srcElement || e.target).files[0];
          getFile(file);
        });
      }
    };
  }

})();