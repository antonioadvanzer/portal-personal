/**
 * @author Antonio Baez
 * created on 30.05.2017
 * 
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules')
      .directive('inputError', inputError);

  /** @ngInject */
  function inputError($interpolate,$compile) {
    return {
        restrict: 'A',
        //priority: 10000,
        //terminal: true,
        scope: {
            inputError: '@'
        },
        link: function (scope, element, attrs) {
            //debugger;
            //console.log(scope.inputError);
            console.log(attrs);
            scope.$watch(attrs.inputError, function(newVal) {
            
            console.log("asdsadasd: "+newVal);
            if(attrs.inputError)
                {
                   // to be continue...
                    //"alert("Asd: "+element);
                    angular.element(element).addClass("has-error");
                }
            });
            
            //element.removeAttr('input-error');
            //$compile(element.contents())(scope);
            /*if (scope.canDrag&& scope.canDrag({idx: scope.$parent.$index})) {
                angular.element(el).attr("draggable", "draggable");
            }*/
        }
      
    };
      
  }


})();