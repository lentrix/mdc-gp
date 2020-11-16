<?php 
include("lib/db.php");

$user = json_decode($_SESSION['mdc-gp']['user']);

if(!SysUtil::isMod($user->idnum)) {
    return header("location: index.php?page=home");
}

if(!isset($_GET['idnum'])) {
    return header("location: index.php?page=utility");
}

$st1 = $pdo->prepare("SELECT gp.idnum, st.idext, st.lname, st.fname FROM `gp-users` gp
        LEFT JOIN stud_info st ON st.idnum=gp.idnum 
        WHERE gp.idnum=?");
$st1->execute([$_GET['idnum']]);

$stud = $st1->fetch(PDO::FETCH_OBJ);

?>

<h1>System Utility</h1>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered table-striped">
            <tr>
                <th class="bg-info text-white">ID Number</th>
                <td><?= $stud->idnum ?>-<?= $stud->idext ?></td>
            </tr>
            <tr>
                <th class="bg-info text-white">Last Name</th>
                <td><?= $stud->lname ?></td>
            </tr>
            <tr>
                <th class="bg-info text-white">First Name</th>
                <td><?= $stud->fname ?></td>
            </tr>
        </table>

        <h3>Change Password</h3>
        <form action="process_util_change_pass.php" method="post">
            <input type="hidden" name="idnum" value="<?= $_GET['idnum']?>">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="cofirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="change_password">Change Password</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <?php include('errors.php'); ?>
    </div>
</div>