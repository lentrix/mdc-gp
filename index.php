<?php 

session_start();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}else {
    $page = "home";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>MDC - Grade Portal</title>
</head>
<body>

<div class="container">

    <?php 
    
    include('nav.php');

    if(isset($_SESSION['mdc-gp']['idnum'])) {
    
        if(in_array($page, ['login', 'activate'])) {
            $page =  "home";
        }
        include("pages/" . $page . ".php");

    }else {
        if($page=="activate") {
            include('pages/activate.php'); 
        }else {
            include('pages/login.php');
        }
    } 
    
    ?>
</div>
</body>
</html>