<?php

$server ="localhost";
$dbName = "blog" ;
$dbUser = "root";
$dbPassword ="";

$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName) ;

if($con){
    echo 'connet done';
}else{
    die("eror :". mysqli_connect_error()) ;
}


?>