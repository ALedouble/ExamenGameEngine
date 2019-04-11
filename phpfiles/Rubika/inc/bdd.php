<?php

$db_server = "localhost";
$db_username = "root";
$db_dbname = "rubika";

try{
    $db = new PDO('mysql:host=' .$db_server.';dbname='.$db_dbname.';charset=utf8',$db_username);
}
catch (PDOException $e){
    echo "Error connection : ".$e->getMessage();
}