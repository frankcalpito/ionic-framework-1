angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  // Form data for the login modal
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})

.controller('PlaylistsCtrl', function($scope) {
  $scope.playlists = [
  { title: 'Pop', id: 1 },
  { title: 'Chill', id: 2 },
  { title: 'Dubstep', id: 3 },
  { title: 'Indie', id: 4 },
  { title: 'Rap', id: 5 },
  { title: 'Cowbell', id: 6 }
  ];
})

.controller('HelloCtrl', function($scope, $ionicModal,$timeout) {

  var client = new WindowsAzure.MobileServiceClient(
    "https://fccazurewebservice.azure-mobile.net/",
    "idAmScfMHgDXmAVtrsLWvuvYWRkMwY33"
  );

        var tbl = client.getTable("tblstudents");

        var query = tbl.select("name", "city", "country").read().done(function (results) {
           console.log(JSON.parse(JSON.stringify(results)));
           $scope.students = JSON.parse(JSON.stringify(results));
        }, function (err) {
           console.log("Error: " + err);
        });

        $scope.newRecordData = {};

        $ionicModal.fromTemplateUrl('templates/add.html', {
          scope: $scope
        }).then(function(modal) {
          $scope.modalAdd = modal;
        });

        $scope.closeModal = function() {
          $scope.modalAdd.hide();
        };

        $scope.addRecord = function() {
          $scope.modalAdd.show();
        };

        $scope.doAdd = function() {
          console.log('Doing add', $scope.newRecordData);

    //call addRecord

    $timeout(function() {
      
      tbl.insert({
           name: $scope.newRecordData.recordName,
           city: $scope.newRecordData.city,
           country: $scope.newRecordData.country
        }).done(function(result){
          console.log(JSON.stringify(result));
        },function(err){
          console.log("err" +err);
        });
      $scope.newRecordData = {};
      $scope.closeModal();
    }, 1000);
  };
})

.controller('PlaylistCtrl', function($scope, $stateParams) {
});
