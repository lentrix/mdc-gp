<?php 
session_start();

include("lib/db.php");

if(isset($_POST['activate'])) {
    $idnum = $_POST['idnum'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $bdate = $_POST['bdate'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $errors = [];

    if($password!==$password_confirm) $errors[] = "The passwords do not match";

    $stm = $pdo->prepare(
        "SELECT idnum, lname, fname, bdate 
        FROM stud_info
        WHERE idnum=:idnum");
    
    $stm->execute([
        ':idnum' => $idnum
    ]);

    $student = $stm->fetch(PDO::FETCH_OBJ);

    if(!$student) {
        $errors[] = "ID Number not found";
    }else {
        
        if( strcasecmp($student->lname, $lname) != 0 ) $errors[] = "Invalid Last Name";

        if( strcasecmp($student->fname, $fname) != 0 ) $errors[] = "Invalid First Name";

        if( strcasecmp($student->bdate, $bdate ) !=0 ) $errors[] = "Invalid Birth Date ";

    }

    if(count($errors)>0) {
        $_SESSION['mdc-gp']['errors'] = json_encode($errors);
        $_SESSION['mdc-gp']['data'] = json_encode($_POST);
        header("location: index.php?page=activate");
    }else {
        $stin = $pdo->prepare("INSERT INTO `gp-users` (`idnum`, `password`) 
            VALUES (:idnum, md5(:password))");
        $stin->execute([
            'idnum' => $idnum,
            'password' => $password
        ]);

        unset($_SESSION['mdc-gp']['errors']);
        unset($_SESSION['mdc-gp']['data']);

        $_SESSION['mdc-gp']['info'] = "Your account has been activated. You may login now.";

        header("location: index.php?page=login");
    }

} else {
    echo "No Form submission.";
}