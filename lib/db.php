<?php 

$host = "192.168.1.10";
$dbname = "mdc";
$user = "grading";
$pass = "system";
$charset = "utf8mb4";

//data source name
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_OBJ
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
}catch(PDOException $ex) {
    echo $ex->getMessage();
}
