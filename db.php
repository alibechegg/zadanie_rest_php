<?php ob_start();

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'api_db';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$query = "SET NAMES utf8 ";
mysqli_query($connection, $query);

if(!$connection){
    echo 'smth went wrong...';
}

?>