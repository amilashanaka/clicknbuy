<?php
include_once './header.php';
include_once './controllers/index.php';
if ($allergy->get_all()['error'] == null) {
    $list = $allergy->get_all()['data'];
} else {
    $list = null;
}
if ($user->get_all_users()['error'] == null) {
    $user_list = $user->get_all_users()['data'];
} else {
    $user_list = null;
}
?>
<?php include_once './navbar.php'; ?>
<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
    $t1 = 'Alagi';
    $t2 = 'List';
    include_once './page_header.php';
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <form action="data/register_clients_allergy.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="register_credit">
                            <input type="hidden" name="created_by" value="<?= $user_act ?>">
                            <input type="hidden" name="created_date" value="<?= $today ?>">
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <select name="allergy" id="allergy" class="form-select "> <?php foreach ($list as $op) { echo '<option value="' . $op['id'] . '" ' . ($id == $op['id'] ? "selected" : "") . ' >' . $op['f1'] . '</option>'; } ?> </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <select name="user" id="user" class="form-select "> <?php foreach ($user_list as $op) { echo '<option value="' . $op['id'] . '" ' . ($id == $op['id'] ? "selected" : "") . ' >' . $op['f1'] . '</option>'; } ?> </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-outline-secondary"> <i class="fas fa-share"></i> Asign</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Created By</th>
                                    <th style="width:3%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Created By</th>
                                    <th style="width:3%; text-align: center;">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($list != null) {
                                    foreach ($list as $row) {
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['f1'] ?></td>
                                            <td><?= printDate($row['created_date']) . " " . printTime($row['created_date']) ?></td>
                                            <td><?= $admin->get_name_by_id($row['created_by']) ?></td>
                                            <td><?php if ($row['status'] == '1') { ?> <button type="button" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?= $row['id']; ?>', 'alagies', 'id', 'alagies_list');"><i class="fa fa-times"></i> <?php } else { ?> <button type="button" id="btnm<?= $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?= $row['id']; ?>', 'alagies', 'id', 'alagies_list');"><i class="fa fa-check "></i> </button> <?php } ?> </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php include_once './footer.php'; ?>
</body>
</html>