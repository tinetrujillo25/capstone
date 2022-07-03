<?php

$dbhost = "localhost: 3309";
$dbuser = "root";
$dbpass = "";
$dbname = "motoworks";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
