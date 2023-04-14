<?php
$host = "localhost";
$user = "Admin";
$password = "Banankaka69";
$db = "slutprojekt";

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES, false
);

$dsn = "mysql:host=$host;dbname=$db";

try{
    $pdo = new PDO($dsn, $user, $password, $options);
}
catch(Exception $e){
    die('Could not connect to database!<br>'.$e);
}
?>