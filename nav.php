    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="images/MDC-Logo-clipped.png" alt="MDC Logo" style="height: 40px">
            MDC - Grade Portal
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(isset($_SESSION['mdc-gp']['user'])) : ?>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $page=='home'?'active':''?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?= $page=='grades'?'active':''?>">
                        <a class="nav-link" href="index.php?page=grades">Grades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page=='profile'?'active':''?>" href="index.php?page=profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>

        <?php endif; ?>
    </nav>