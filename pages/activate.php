<br>

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-info">
                <h3>Account Activation</h3>
            </div>
            <div class="card-body">
                
                <form action="process_activate.php" method="post">
                
                    <div class="form-group">
                        <label for="idnum">ID Number</label>
                        <input type="text" name="idnum" id="idnum" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="bdate">Birth Date</label>
                        <input type="date" name="bdate" id="bdate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit" name="activate">
                            Activate Account
                        </button>
                    </div>
                
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-body bg-warning">
                <p class="lead">Notice!</p>
                <p>
                    All of the field entries here (except passwords) must match your enrolment records 
                    in order for your account to be activated. This facility will not re-activate 
                    a previously activated account.
                </p>
                <p>
                    If you require further assistance, please contact the Registrar's office
                    at Tel. No. 508-8106 loc. 105
                </p>
            </div>
        </div>
    </div>
</div>