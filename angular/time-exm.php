<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 05.02.2016
 * Time: 8:44
 */ ?><!doctype html>
<html lang="en" ng-app="timeApp">
<head>
    <meta charset="utf-8">
    <title ng-bind="currentTime"> --- </title>
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <script src="/lib/js/angular/1.4.9/angular.js"></script>
    <script>
        var timeApp = angular.module('timeApp', []);

        timeApp.controller('timeCtrl', function($scope){
            $scope.format = 'MM/dd/y hh:mm:ss a';
        });

        timeApp.directive('myCurrentTime', function($timeout, dateFilter){
            return function(scope, element, attrs) {
                var format,  // формат даты
                    timeoutId; // timeoutId, так что мы можем останавливать обновление времени

                // используя обновление UI
                function updateTime() {
                    element.text(dateFilter(new Date(), format));
                }

                // проверка выражения и обновление UI при изменении.
                scope.$watch(attrs.myCurrentTime, function(value) {
                    format = value;
                    updateTime();
                });

                // расписание обновлений за секунду
                function updateLater() {
                    // сохраняем timeoutId для отмены
                    timeoutId = $timeout(function() {
                        updateTime(); // обновляем DOM
                        updateLater(); // расписание других обновлений
                    }, 500);
                }

                // прослушиваем разрушающее (removal) DOM событие, и отменяем следующее обновление UI
                // для предотвращения обновления времени после того как DOM-элемент был удален.
                element.bind('$destroy', function() {
                    $timeout.cancel(timeoutId);
                });

                updateLater(); // убиваем процесс обновления UI.
            }
        });

    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div ng-controller="timeCtrl">
            Date format: <input ng-model="format"> <hr/>
            Current time is: <span my-current-time="format"></span>
        </div>
    </div>
</div>
</body>
</html>