<?php 
session_start();
include ("lib/db.php");

if(isset($_POST['activate'])) {
    $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
    
    $idnum = $_POST['idnum'];
    $passw = substr(str_shuffle($permitted_chars), 0, 6);

    $st1 = $pdo->prepare("SELECT idnum FROM `gp-users` WHERE idnum=?");
    $st1->execute([$idnum]);
    $exists = $st1->fetch();

    $st3 = $pdo->prepare("SELECT lname, fname FROM stud_info WHERE idnum=?");
    $st3->execute([$idnum]);
    $stud = $st3->fetch();

    if(!$exists) {
        $st2 = $pdo->prepare("INSERT INTO `gp-users` (idnum, `password`) 
            VALUES(?,MD5(?))");

        $st2->execute([$idnum, $passw]);

        $_SESSION['mdc-gp']['info'] = "$stud->lname, $stud->fname has been activated<br>
                ID Number: <strong>$idnum</strong><br>
                Password: <strong>$passw</strong>";
    }else {
        $error = [];
        $error[] = "$idnum have already been activated.";
        $_SESSION['mdc-gp']['errors'] = json_encode($error);
    }
}

header("location: index.php?page=utility");
