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

}]);