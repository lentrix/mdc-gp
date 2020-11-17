<?php 

include "lib/db.php";

$data = $pdo->query("SELECT lname, fname FROM stud_info WHERE lname LIKE '%Mascari%'")->fetchAll();

foreach($data as $d) {
    echo "$d->lname\n";
}