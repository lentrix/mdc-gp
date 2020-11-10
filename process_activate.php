<?php 

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

        if( strcasecmp($student->bdate, $bdate ) !=0 ) $errors[] = "Invalid Birth Date " . $student->bdate . "<>" . $bdate;

    }

    print_r($errors);

} else {
    echo "No Form submission.";
}