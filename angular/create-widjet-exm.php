<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 05.02.2016
 * Time: 11:51
 */ ?><!doctype html>
<html lang="en" ng-app="widgetApp">
<head>
    <meta charset="utf-8">
    <title> create widget </title>
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <script src="/lib/js/angular/1.4.9/angular.js"></script>
    <script>
        var widgetApp = angular.module('widgetApp', []);

        widgetApp.controller('widgetCtrl', function($scope){
            $scope.title = 'Lorem ipswummi';
            $scope.text = 'this description title ....';
        });

        widgetApp.directive('zippy', function(){
            return{
                restrict: 'C',
                // Этот HTML заменит директиву zippy.
                replace: true,
                transclude: true,
                scope: {title: '@zippyTitle'},
                template: '<div><div class="title">{{title}}</div><div class="body" ng-transclude></div></div>',
                // Связующая функция добавит поведение к шаблону
                link: function(scope, element, attrs){
                    // Элемент заголовка
                    var title = angular.element(element.children()[0]),
                    // Состояние Opened / closed
                    opened = true;

                    // Клик по заголовку должен открыть/закрыть zippy
                    title.bind('click', toggle);

                    // Переключение состояния closed/opened
                    function toggle() {
                        opened = !opened;
                        element.removeClass(opened ? 'closed' : 'opened');
                        element.addClass(opened ? 'opened' : 'closed');
                    }

                    // инициализация zippy
                    toggle();
                }
            }
        })

    </script>
    <style>
        .zippy {
            border: 1px solid black;
            display: inline-block;
            width: 250px;
        }
        .zippy.opened > .title:before { content: '▼ '; }
        .zippy.opened > .body { display: block; }
        .zippy.closed > .title:before { content: '► '; }
        .zippy.closed > .body { display: none; }
        .zippy > .title {
            background-color: black;
            color: white;
            padding: .1em .3em;
            cursor: pointer;
        }
        .zippy > .body {
            padding: .1em .3em;
        }
    </style>
</head>
<body>
<br/>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div ng-controller="widgetCtrl">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 col-md-2 control-label">Title:</label>
                    <div class="col-lg-10 col-sm-10 col-md-10">
                        <input ng-model="title" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 col-md-2 control-label">Text:</label>
                    <div class="col-lg-10 col-sm-10 col-md-10">
                        <textarea ng-model="text" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="zippy" zippy-title="Detail: {{title}}...">{{text}}</div>
        </div>
    </div>
</div>
</body>
</html>