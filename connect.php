<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "racunari";

$conn = new mysqli($host,$user,$pass,$database);

if ($conn->connect_errno){
    exit("Base not connected");
}
?>