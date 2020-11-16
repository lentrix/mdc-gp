<?php $user = json_decode($_SESSION['mdc-gp']['user']); ?>

<h1>Change Password</h1>
<div class="card">
    <div class="card-body bg-info text-white">
        <?= $user->lname . ", " . $user->fname ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-5">
        <form action="process_change_pass.php" method="post">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary float-right" type="submit" name="change_pass">Change Password</button>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <?php include "errors.php" ?>
    </div>
</div>