<br>
<div class="row">

    <div class="col-md-5">
    
        <div class="card">
            <div class="card-header bg-info">
                <h3>User Login</h3>
            </div>
            <div class="card-body">
                <form action="process_login.php" method="post">
                    <div class="form-group">
                        <label for="idnum">ID Number</label>
                        <input type="text" class="form-control" name="idnum" id="idnum">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit" name="login">
                            Login 
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        <?php include('errors.php'); ?>
        <?php include('infos.php'); ?>
        <h3>Unable to Login?</h3>
        <a href="index.php?page=activate" class="btn btn-info">Activate your account</a>
    </div>

</div>