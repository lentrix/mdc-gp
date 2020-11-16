<?php $user = json_decode($_SESSION['mdc-gp']['user']); ?>

<?php include "infos.php"; ?>

<br>

<h1>User Profile</h1>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered table-striped">
            <tr>
                <th class="bg-primary text-white">ID Number</th>
                <td><?= $user->idnum ?>-<?= $user->idext ?></td>
            </tr>
            <tr>
                <th class="bg-primary text-white">Last Name</th>
                <td><?= $user->lname ?></td>
            </tr>
            <tr>
                <th class="bg-primary text-white">First Name</th>
                <td><?= $user->fname ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <a href="index.php?page=ch_pass" class="btn btn-primary">Change Password</a>
    </div>
</div>