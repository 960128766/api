<?php
$localhost="localhost";
$root="root";
$password="";
$db="api";
$connect=mysqli_connect($localhost,$root,$password,$db);
if ($connect){
    echo '';
}else{
    die('not connect');
}