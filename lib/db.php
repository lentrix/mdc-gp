<?php 

// $host = "192.168.1.10";
$host = "203.177.91.83";
$dbname = "mdc";
$user = "grading";
$pass = "system";

// $host = "localhost";
// $dbname = "mdc";
// $user = "root";
// $pass = "";

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
