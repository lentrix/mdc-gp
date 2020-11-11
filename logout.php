<?php 
session_start();

unset($_SESSION['mdc-gp']['user']);

header("location: index.php?page=login");

