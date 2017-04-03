/*angular
  	.module('vidaplena.extranet.directives', [])
	.directive('ngEnter', function() {
	    return function(scope, element, attrs) {
	      element.bind("keydown", function(event) { 
	          if(event.which === 13) {
	            scope.$apply(function(){
	              scope.$eval(attrs.ngEnter);
	            });
	          }
	      });
	    };
	  })
	  .directive('focusMe', function($timeout, $parse) {
	    return {
	      link: function(scope, element, attrs) {
	        var model = $parse(attrs.focusMe);

	        scope.$watch(model, function(pValue) {
	            value = pValue || 0;
	            $timeout(function() {
	              element[value].focus();
	              // console.log(element[value]);
	            });
	        });
	      }
	    };
	  }); */