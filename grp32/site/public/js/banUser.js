main.controller('BanUserController', ['$scope', '$http', function($scope, $http) {

  $scope.myProfile = '';


  $scope.$watch('users',function(){
    if ($scope.users != null) {
      console.log("users: " +  $scope.users);
      $scope.arrayUsers = $scope.users.split(",");
      console.log("utilizadores: " +  $scope.arrayUsers);
    };
  });
  $scope.$watch('me',function(){
    // console.log("I am "+$scope.me);
    // console.log("utilizadores:" +$scope.arrayUsers);
    $scope.myProfile = JSON.parse(JSON.stringify($scope.arrayUsers));  
    $scope.myProfile.forEach(function(entry) {
      if (entry == $scope.me) {
        console.log($scope.myProfile.indexOf(entry));
        $scope.myProfile[$scope.myProfile.indexOf(entry)] = "profile";
      }else{
        $scope.myProfile[$scope.myProfile.indexOf(entry)] = "otherUserProfile/"+$scope.myProfile[$scope.myProfile.indexOf(entry)]
      }
    });
    console.log($scope.myProfile);
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

