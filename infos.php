<?php if(isset($_SESSION['mdc-gp']['info'])): ?>

    <div class="card">
        <div class="card-body bg-info">
            <?= $_SESSION['mdc-gp']['info']; ?>
        </div>
    </div>

    <?php 
        //remove info from session
        unset($_SESSION['mdc-gp']['info']);
    ?>

<?php endif; ?>