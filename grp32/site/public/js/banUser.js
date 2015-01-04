main.controller('BanUserController', ['$scope', '$http', function($scope, $http) {

    $scope.$watch('users',function(){
        if ($scope.users != null) {
            $scope.arrayUsers = $scope.users.split(",");
        };
    });

    $scope.toggleBanUser = function (username) {

       $http.post('http://192.168.216.134/grp32/site/public/toggleBanUser', {'username': username}).   
       success(function(data, status, headers, config) {
           if($scope.bannedUsers.indexOf(","+username) == -1){
            $scope.bannedUsers += ","+username;
            console.log("1"+$scope.bannedUsers);
        }else{
            $scope.bannedUsers = $scope.bannedUsers.replace(","+username, "");            
            console.log("2"+$scope.bannedUsers);
        }
    }).
       error(function(data, status, headers, config) {
        console.log("Could not ban user");
    });
   }
}]);

