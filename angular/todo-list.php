<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 03.02.2016
 * Time: 23:51
 */ ?><!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <title>My HTML File</title>
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <script src="/lib/js/angular/1.0.6/angular.js"></script>
    <script>
        function TodoCtrl($scope) {
            $scope.todos = [
                {text:'learn angular', done:true},
                {text:'build an angular app', done:false},
                {text:'build an angular app', done:false},
                {text:'build an angular app', done:false},
                {text:'build an angular app', done:false}];

            $scope.addTodo = function() {
                if($scope.todoText.length){
                    $scope.todos.push({text:$scope.todoText, done:false});
                    $scope.todoText = '';
                }
            };

            $scope.remaining = function() {
                var count = 0;
                angular.forEach($scope.todos, function(todo) {
                    count += todo.done ? 0 : 1;
                });
                return count;
            };

            $scope.archive = function() {
                var oldTodos = $scope.todos;
                $scope.todos = [];
                angular.forEach(oldTodos, function(todo) {
                    if (!todo.done) $scope.todos.push(todo);
                });
            };
        }
    </script>
    <style>
        .done-true {
            text-decoration: line-through;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Список дел</h2>
            <div ng-controller="TodoCtrl">
                <span>Осталось {{remaining()}} из {{todos.length}}</span>
                [ <a href="" ng-click="archive()">архив</a> ]
                <ul class="unstyled">
                    <li ng-repeat="todo in todos">
                        <input type="checkbox" ng-model="todo.done">
                        <span class="done-{{todo.done}}">{{todo.text}}</span>
                    </li>
                </ul>
                <form ng-submit="addTodo()">
                    <input type="text" ng-model="todoText"  size="30"
                           placeholder="впишите новое дело">
                    <input class="btn-primary" type="submit" value="добавить">
                </form>
            </div>
        </div>
    </div>

</body>
</html>