app.controller('ListCtrl', function ListCtrl($scope, Project) {
  $scope.projects = Project.query();
});