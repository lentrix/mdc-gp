<?php 
session_start();
include "lib/db.php";

if(isset($_POST['login'])) {
    $idnum = $_POST['idnum'];
    $pass = $_POST['password'];

    $st = $pdo->prepare("SELECT si.lname, si.fname, u.idnum FROM `gp-users` u
        LEFT JOIN stud_info si ON si.idnum=u.idnum
        WHERE `u`.`idnum`=? AND `u`.`password`=MD5(?)");
    $st->execute([$idnum, $pass]);

    $data = $st->fetch(PDO::FETCH_OBJ);

    if($data) {
        $_SESSION['mdc-gp']['user'] = json_encode($data);
        header("location: index.php?page=home");
    }else {
        $errors[] = "Invalid user credentials!";
        $_SESSION['mdc-gp']['errors'] = json_encode($errors);
        header("location: index.php?page=login");
    }
}else {
    echo json_encode($_POST);
}