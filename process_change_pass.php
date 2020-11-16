<?php 
session_start();

include ("lib/db.php");

$user = json_decode($_SESSION['mdc-gp']['user']);

if(isset($_POST['change_pass'])) {

    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    $errors = [];

    //check current password
    $st1 = $pdo->prepare("SELECT * FROM `gp-users` WHERE idnum = :idnum AND `password`=md5(:password)");
    $st1->execute(['idnum'=>$user->idnum, 'password'=>$current]);
    $currUsr = $st1->fetch(PDO::FETCH_OBJ);

    if($currUsr != null) {
        if($new==$confirm) {
            $st2 = $pdo->prepare("UPDATE `gp-users` SET `password`=MD5(:pass) WHERE idnum=:idnum");
            $st2->execute(['pass'=>$new, 'idnum'=>$user->idnum]);
            $_SESSION['mdc-gp']['info'] = "Your password has been changed.";
            
            return HEADER("location: index.php?page=profile");
        }else {
            $errors[] = "Your new password does not match the confirmation password.";
        }
    }else {
        $errors[] = "The current password you entered is incorrect.";
    }

} else {
    $errors[] = "Invalid access to facility.";
}

$_SESSION['mdc-gp']['errors'] = json_encode($errors);

header("location: index.php?page=ch_pass");
