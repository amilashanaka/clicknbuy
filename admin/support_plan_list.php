<?php
include_once './header.php';
include_once './controllers/index.php';
if ($support_plan->get_all()['error'] == null) {
    $list = $support_plan->get_all()['data'];
} else {
    $list = null;
}


?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php
    $t1 = 'Support Plan';
    $t2 = 'List';

    include_once './page_header.php';
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <?php if ($_SESSION['role'] < 3) { ?>
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="row">
                                    <div class="col6">
                                        <button type="button" class="btn btn-app" onclick="location.href = 'support_plan'"><i class="fas fa-file"></i>Add New</button>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    <?php } ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date Of Birth</th>
                                    <th>Plan Name</th>
                            


                                    <th style="width:3%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date Of Birth</th>
                                    <th>Plan Name</th>
                        
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
                                            <td><a href="support_plan?id=<?= base64_encode($row['id']); ?>"><?= $user->get_name_by_id($row['user'])  ?></a></td>

                                            <td><?= $user->get_bday_by_id($row['user']) ?></td>
                                            <td><?= $row['f1'] ?></td>
                                          

                                            <td><?php if ($row['status'] == '1') { ?> <button type="button" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?= $row['id']; ?>', 'support_plan', 'id', 'support_plan_list');"><i class="fa fa-times"></i> <?php } else { ?> <button type="button" id="btnm<?= $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?= $row['id']; ?>', 'support_plan', 'id', 'support_plan_list');"><i class="fa fa-check "></i> </button> <?php } ?> </td>
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