<?php 
include "lib/db.php";

$user = json_decode($_SESSION['mdc-gp']['user']);

if(!SysUtil::isMod($user->idnum)) {
    return header("location: index.php?page=home");
}

if(isset($_POST['search'])) {

    $st1 = $pdo->prepare("SELECT gp.idnum, st.lname, st.fname FROM `gp-users` gp 
        LEFT JOIN stud_info st ON st.idnum=gp.idnum 
        WHERE lname LIKE :key OR fname LIKE :key
        ORDER BY lname, fname;");

    $st1->execute(['key'=> '%' . $_POST['key'] . '%']);
    $data = $st1->fetchAll();
}

?>
<br>
<?php include("infos.php"); ?>

<h1>System Utility</h1>

<div class="row">
    <div class="col-md-4">
        <form action="index.php?page=utility" method="post">
            <div class="form-group">
                <label for="key">Search Student</label>
                <input type="text" name="key" id="key" class="form-control" 
                    placeholder="Last Name or First Name but not both">
            </div>
            <button class="btn btn-primary" type="submit" name="search">Search</button>
        </form>
    </div>

    <?php if(isset($_POST['search'])) : ?>

        <div class="col-md-8">
            <p>Search results for keyword "<?= $_POST['key'];?>"...</p>

            <?php if(count($data)==0): ?>
                <div class="card">
                    <div class="card-body bg-info">
                        No records found. <br>
                        Note that only activated accounts are searchable by this utility.
                    </div>
                </div>
            <?php endif; ?>
            <div class="list-group">
                <?php foreach($data as $std): ?>
                    <a href="index.php?page=util-stud&idnum=<?= $std->idnum ?>" class="list-group-item list-group-item-action">
                        <?= $std->lname . ', ' . $std->fname ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>
</div>
