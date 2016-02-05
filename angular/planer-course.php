<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 04.02.2016
 * Time: 9:41
 */ ?><!doctype html>
<html lang="en" ng-app="courseListApp">
<head>
    <meta charset="utf-8">
    <title>My HTML File</title>
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <script src="/lib/js/angular/1.4.9/angular.js"></script>
    <script>
        // model
        var model = {
            user: "User1",
            courses: [
                {name: "course 1", status: true},
                {name: "course 2", status: true},
                {name: "course 3", status: true},
                {name: "course 4", status: true},
                {name: "course 5", status: true},
                {name: "course 6", status: true},
                {name: "course 7", status: true},
                {name: "course 8", status: true},
                {name: "course 9", status: true}
            ]
        }

        // module
        var courseListApp = angular.module("courseListApp", []);

        // controller
        courseListApp.controller("courseListCtrl", function($scope){
            $scope.list = model;

            // add new course
            $scope.addNewCourse = function(){
                // добавляєм в кінець масиву новий обєкт
                $scope.list.courses.push({
                    name: $scope.newCourseName,
                    passed: true
                });

                $scope.newCourseName = '';
            };

            $scope.setCourseClass = function(status){
                return status ? "success" : "warning";
            }

            $scope.showText = function(status){
                return status ? "Да" : "Ні";
            }
        })

    </script>
</head>
<body>
    <div class="container" ng-controller="courseListCtrl">
        <div class="row">
            <h1>Планирование уроков.</h1>
            <h3>Пользователь: {{list.user}}. количество курсов = {{list.courses.length}}</h3>
            <hr/>
        </div>
        <div class="row">
            <div class="form-inline">
                <div class="form-group">
                    <label> Курс: </label>
                    <input class="form-control" ng-model="newCourseName"/>
                </div>
                <button class="btn btn-info" ng-click="addNewCourse()">Добавить</button>
            </div>
            <hr/>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Курс</th>
                    <th></th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="course in list.courses">
                    <td>{{course.name}}</td>
                    <td><input type="checkbox" ng-model="course.status"></td>
                    <td class="{{setCourseClass(course.status)}}">
                        <span class="text-{{setCourseClass(course.status)}}">
                            {{showText(course.status)}}
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>