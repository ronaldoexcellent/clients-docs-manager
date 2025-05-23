<?php include "../base.php"; ?>
<!-- Full settings for all pages -->
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ app.description }}" />
    <meta name="author" content="{{ app.author }}" />
    <meta name="keywords" content="{{ app.keywords }}" />
    <meta name="copyright" content="{{ app.copyright }}" />
    <meta name="color-scheme" content="{{ app.mode }}" />
    <link rel="icon" href="{{ app.logo }}" />
    <link rel="stylesheet" href="<?php echo baseUrl('dependencies/bootstrap-5.1.3/dist/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo baseUrl('dependencies/fontawesome-6.7.2/css/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo baseUrl('static/css/styles.css'); ?>" />
  </head>

  <script src="<?php echo baseUrl('dependencies/fontawesome-6.7.2/js/all.min.js'); ?>"></script>
  <script src="<?php echo baseUrl('dependencies/bootstrap-5.1.3/dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo baseUrl('dependencies/angular-1.8.2/angular.min.js'); ?>"></script>
  <script>
    var app = angular.module('myApp', []);

    // App Controller
    app.controller('myCtrl', ($scope) => {
      // Package Data
      $scope.app = {
        name: "Clients Docs Manager",

        logo: "<?php echo baseUrl('assets/logo.svg'); ?>",

        theme: "success",

        author: "King Rex",

        copyright: new Date().getFullYear(),

        mainBG: "<?php echo baseUrl('assets/bg.png'); ?>",

        mode: 'light', // light || dark

        shortDescription: "Providing top-notch care for all our clients.",

        description: "Clients Docs Manager is a document manager website/webapp that lets an organization manage (save, locate & delete) records/files of their clients easier and faster, in order to reduce unnecessary stress and extreme time consumption in finding these files.",

        keywords: "care, clients, management, files, manager, store",
        
        version: "0.1.0"
      };

      // For delete button available in all database extracted customer data
      $scope.del_icon = "trash-can text-danger";
      // Change the delete button icon & font-color
      $scope.changeDelIcon = () => $scope.del_icon = "times text-dark font-weight-bold";
    });
  </script>
</html>