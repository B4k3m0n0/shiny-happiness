main.controller('TournamentController', ['$scope', function($scope) {
    $scope.rounds = [
    { value: '1', label: '1 Round'}, 
    { value: '2', label: '2 Rounds'},
    { value: '3', label: '3 Rounds'},
    { value: '4', label: '4 Rounds'},
    { value: '5', label: '5 Rounds'}
    ];

    $scope.numberRounds = $scope.rounds[0];

        
    $scope.$watch('numberRounds', function () {

        $scope.bots = [];

        var players = Math.pow(2,$scope.numberRounds.value);

        for (var i = 0; i < players; i++) {
            val = i+1;

            if (val == 1){
                txt = '1 Bot'
            } else {
                txt = val + ' Bots'
            }

            $scope.bots.push({value: val, label: txt})
        }
        $scope.numberBots = $scope.bots[0];
    });

}]);

