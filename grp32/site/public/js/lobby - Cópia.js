main.controller('LobbyController', ['$scope', function($scope) {

	$scope.options = {
		'solo': {'single bot': {'1': 'start match'}, 'multi bot': {'1': 'number of bots', '2': 'start match'}},
		'multi': {'create game': {'1': 'game name', '2': 'match size', '3': 'bots', '4': 'create game'}, 'join game': {'1': 'match size', '2': 'bots', '3': 'search games'}}
	};

	$scope.firstSelect = -1;
	$scope.secondSelect = -1;


	$scope.unsorted = function (obj){
		if (!obj) {
			return [];
		}
		return Object.keys(obj);
	}

	var firstKey = null,
	secondKey = null;


	$scope.optionClick = function (key, index) {
		var counter = 0;

		for (var i = 0; i < Object.keys($scope.options).length; i++) {
			if (key == $scope.unsorted($scope.options)[i]) {
				counter ++;
			}
		}

		if (counter != 0) {
			firstKey = key;
			$scope.secondKey = $scope.unsorted($scope.options[firstKey]);
			$scope.firstSelect = index;
			$scope.secondSelect = -1;
		}else{
			secondKey = key;
			$scope.listOptions = $scope.options[firstKey][secondKey];
			$scope.secondSelect = index;
		}
	}


	/*--------GAME FILTERS-------*/
	$scope.nameFilter = 0;
	$scope.sizeFilter = 0;
	$scope.statusFilter = 0;
	$scope.botsFilter = 0;
	$scope.reverse = false;

	$scope.filterByName = function () {
		if($scope.nameFilter == 0){
			$scope.reverse = false;
		}
		$scope.nameFilter = ($scope.nameFilter == 1 ? '2' : '1');
		if ($scope.nameFilter != 0){
			$scope.sizeFilter = 0;
			$scope.statusFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterBySize = function () {
		if($scope.sizeFilter == 0){
			$scope.reverse = false;
		}
		$scope.sizeFilter = ($scope.sizeFilter == 1 ? '2' : '1');
		if ($scope.sizeFilter != 0){
			$scope.nameFilter = 0;
			$scope.statusFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterByStatus = function () {
		if($scope.statusFilter == 0){
			$scope.reverse = false;
		}
		$scope.statusFilter = ($scope.statusFilter == 1 ? '2' : '1');
		if ($scope.statusFilter != 0){
			$scope.sizeFilter = 0;
			$scope.nameFilter = 0;
			$scope.botsFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

	$scope.filterByBots = function () {
		if($scope.botsFilter == 0){
			$scope.reverse = false;
		}
		$scope.botsFilter = ($scope.botsFilter == 1 ? '2' : '1');
		if ($scope.botsFilter != 0){
			$scope.sizeFilter = 0;
			$scope.statusFilter = 0;
			$scope.nameFilter = 0;
		}
		$scope.reverse = !$scope.reverse;
	}

}]);

main.controller('ItemController', ['$scope', '$timeout', function($scope, $timeout) {
	$scope.show = false;
	var timer;

	$scope.showIt = function () {
		timer = $timeout(function () {
			$scope.show = true;
		}, 200);
	};
	$scope.hideIt = function () {
		$timeout.cancel(timer);
		$scope.show = false;
	};

}]);