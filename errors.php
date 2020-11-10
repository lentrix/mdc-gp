<?php 

if(isset($_SESSION['mdc-gp']['errors'])) {
    $errors = json_decode($_SESSION['mdc-gp']['errors']);
}

?>

<?php if(isset($errors) && count($errors)>0) : ?>

<div class="card">
    <div class="card-body bg-danger text-warning">
        <ul>
        <?php foreach($errors as $err): ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php endif; ?>

<?php unset($_SESSION['mdc-gp']['errors']); ?>