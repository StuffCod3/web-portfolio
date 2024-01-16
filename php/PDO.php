<?php
    $host = "localhost";
    $dbname = "portfolio_db";
    $username = "root";
    $password = '1234';
    $port = 3306;

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username, $password);
    } catch (PDOException $ex){
        echo "$ex";
    }
