<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 04.02.2016
 * Time: 09:00
 */ ?><!doctype html>
<html lang="en" ng-app="helloWorldApp">
    <head>
        <meta charset="utf-8">
        <title>My HTML File</title>
        <link rel="stylesheet" href="/lib/css/bootstrap.css">
        <script src="/lib/js/angular/1.4.9/angular.js"></script>
        <script>
            // привязка модуля к елементу
            var helloWorldApp = angular.module("helloWorldApp",[]);

            // привязка контролера к елементу
            helloWorldApp.controller("HelloWorldCtrl", function($scope){
                $scope.message = "Привет вася";

                $scope.clickHandker = function(){
                    $scope.message = $scope.text;
                }
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div ng-controller="HelloWorldCtrl">
                    <h1>{{message}}</h1>
                    <input ng-model="text" />
                    <button ng-click="clickHandker()">Обновить</button>
                </div>
            </div>
        </div>
    </body>
</html>