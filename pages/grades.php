<?php

include "lib/db.php";

$usr = json_decode($_SESSION['mdc-gp']['user']);

$st1 = $pdo->prepare("SELECT se.sem_code, sm.sem 
        FROM stud_enrol se 
        LEFT JOIN sems sm ON se.sem_code = sm.sem_code
        WHERE se.idnum=?");
$st1->execute([$usr->idnum]);
$sems = $st1->fetchAll();


if(isset($_GET['sem_code'])) {
    $semCode = $_GET['sem_code'];

    $st2 = $pdo->prepare(
        "SELECT sb.mgrade, sb.fgrade, sb.rating, sj.name, sj.descript, tch.lname, tch.fname
        FROM `sub_enrol` sb 
        LEFT JOIN subjects sj ON sj.sub_code=sb.sub_code
        LEFT JOIN class cl ON cl.class_code=sb.class_code
        LEFT JOIN teacher tch ON tch.tch_num=cl.tch_num
        WHERE sb.idnum=:idnum AND sb.sem_code=:sem_code");
    $st2->execute([
        'idnum' => $usr->idnum,
        'sem_code' => $semCode
    ]);

    $grades = $st2->fetchAll();
}

function cutify($text) {
    return ucwords(strtolower($text));
}
?>

<div class="card">
    <div class="card-header bg-light text-dark">
        <div class="row">
            <div class="col-sm-6" style="font-size: 1.2em">
                <strong>ID Number:</strong> <?= $usr->idnum . "-" . $usr->idext ?> <br>
                <strong>Student Name:</strong> <?= $usr->fname . " " . $usr->lname ?>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <form method="get" action="">
                        <input type="hidden" name="page" value="grades">
                        Select Semester:
                        <select name="sem_code" id="sem_code">
                            <option value="">...</option>
                            <?php foreach($sems as $sem): ?>

                                <option value="<?= $sem->sem_code?>" 
                                        <?= (isset($semCode) && $semCode==$sem->sem_code)?"selected":"" ?>>
                                    <?= $sem->sem?>
                                </option>

                            <?php endforeach;?>
                        </select>
                        <button type="submit" name="submit-sem" class="btn btn-sm btn-secondary">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if(isset($semCode)): ?>

            <h3 style="text-align:center">1st Sem AY 2020-2021</h3>

            <table class="table table-bordered table-stripped table-sm">
                <thead>
                    <tr class="bg-info">
                        <th scope="grd">Course No.</th>
                        <th scope="grd" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Description</th>
                        <th scope="grd" class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">Teacher</th>
                        <th scope="grd" style="text-align:center">Mid</th>
                        <th scope="grd" style="text-align:center">Fin</th>
                        <th scope="grd" style="text-align:center">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($grades as $grade): ?>

                        <tr>
                            <td><?= $grade->name ?></td>
                            <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"><?= cutify($grade->descript) ?></td>
                            <td class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell"><?= cutify($grade->lname) ?>, <?= cutify($grade->fname) ?></td>
                            <td style="text-align:center"><?= $grade->mgrade ?></td>
                            <td style="text-align:center"><?= $grade->fgrade ?></td>
                            <td style="text-align:center"><?= $grade->rating ?></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
    </div>
</div>
