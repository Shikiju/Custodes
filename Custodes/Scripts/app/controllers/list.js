app.controller('ListCtrl', function ListCtrl($scope, Project) {

  //Vars
  $scope.projects = [];
  $scope.project = new Project();

  //Functions
  $scope.getProject = function(project) {
    $scope.project = new Project(project);
  }

  $scope.saveProject = function() {

    //Create
    if ($scope.project.Id === undefined) {

      $scope.project.create(function() {
        $scope.projects = Project.query();
      });

    }
    //Update
    else {

      $scope.project.update(function() {
        $scope.projects = Project.query();
      });

    }
  }

  //Events
  $scope.$on('login', function(event, message) {
    console.log('test: login');

    $scope.projects = Project.query(function(projects) {
      $scope.project = new Project(projects[0]);
    });
  });
  
  $scope.$on('logout', function(event, message) {
    console.log('test: logout');
  });
});