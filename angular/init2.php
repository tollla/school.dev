<?php
/**
 * Created by PhpStorm.
 * User: Anatoli
 * Date: 03.02.2016
 * Time: 23:44
 */ ?><!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <title>My HTML File</title>
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <script src="/lib/js/angular/1.0.6/angular.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <label>Имя:</label>
            <input type="text" ng-model="yourName" placeholder="Введите свое имя">
            <hr>
            <h1>Привет {{yourName}}!</h1>
        </div>
    </div>
</body>
</html>