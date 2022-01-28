<?php 

session_start();
include("lib/util.php");

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
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>MDC - Grade Portal</title>
</head>
<body>

<div class="container">

    <?php 
    
    include('nav.php');

    if(isset($_SESSION['mdc-gp']['user'])) {
    
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