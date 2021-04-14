<?php
define('host', "localhost:3307");
define('USERNAME', "root");
define('PASSWORD',"root");
define('DATABASE', "ets");
//define('port',3307);
$link=mysqli_connect(host, USERNAME, PASSWORD, DATABASE);
if($link==false){
    die("ERROR connecting SERVER" .mysqli_connect_error());
}
