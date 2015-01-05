var main = angular.module('main', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
});

main.controller('MainController', ['$scope', function($scope) {

	if(document.getElementsByClassName("leftbar")[0].childElementCount != 0) {
		$scope.leftBar = true;
		$scope.isLeftSet = true;
	}else{
		$scope.isLeftSet = false;
		$scope.leftBar = false;
	}

	if(document.getElementsByClassName("rightbar")[0].childElementCount != 0){
		$scope.rightBar = true;
		$scope.isRightSet = true;
	}else{
		$scope.isRightSet = false;
		$scope.rightBar = false;
	}
}]);