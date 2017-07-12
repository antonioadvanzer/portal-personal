/**
 * @author Antonio Baez
 * created on 07.06.2017
 * 
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules')
      .directive('vaidFile', vaidFile);

  /** @ngInject */
  function vaidFile($interpolate,$compile) {
      return {
        require: 'ngModel',
        link: function (scope, el, attrs, ngModel) {
            ngModel.$render = function () {
                ngModel.$setViewValue(el.val());
            };

            el.bind('change', function () {
                scope.$apply(function () {
                    ngModel.$render();
                });
            });
        }
    };
  }


})();