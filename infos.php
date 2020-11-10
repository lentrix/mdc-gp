<?php 

if(isset($_SESSION['mdc-gp']['info'])) {
    $infos = $_SESSION['mdc-gp']['info'];
}

?>

<?php if(isset($info)) : ?>

<div class="card">
    <div class="card-body bg-info text-white">
        <?= $info; ?>
    </div>
</div>

<?php else: ?>

<?= json_encode($_SESSION['mdc-gp']); ?>

<?php endif; ?>

<?php unset($_SESSION['mdc-gp']['info']); ?>