<?php 
session_start();
include("lib/util.php");
include("lib/db.php");

$user = json_decode($_SESSION['mdc-gp']['user']);

if(!SysUtil::isMod($user->idnum)) {
    return header("location: index.php?page=home");
}

if(isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $idnum = $_POST['idnum'];

    if($password!=$confirm) {
        $errors[] = "The passwords do not match.";
        $_SESSION['mdc-gp']['errors'] = json_encode($errors);
        return header("location: index.php?page=util-stud&idnum=$idnum");
    }

    $st1 = $pdo->prepare("UPDATE `gp-users` SET `password`=MD5(:password) WHERE idnum=:idnum");
    $st1->execute([
        'password' => $password,
        'idnum' => $idnum
    ]);

    $_SESSION['mdc-gp']['info'] = "The password of $idnum has been changed to $password.";

    header("location: index.php?page=utility");
}