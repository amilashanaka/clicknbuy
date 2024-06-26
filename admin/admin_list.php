<?php
include_once './header.php';

include_once './controllers/index.php';

if (isset($_GET['role'])) {
    $role = base64_decode($_GET['role']);



    if ($admin->get_admins_by_role($role)['error'] == null) {
        $list = $admin->get_admins_by_role($role)['admin'];
    } else {
        $list = null;
    }
} else {
    $role = 0;
    $list = null;
}

// new comments are


?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php

    $t1 = $lang['Admin User'];
    $t2 = $lang['List'];

    include_once './page_header.php';

    ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12"> 
                <!-- /.card -->            

                <div class="card">
                    <?php // if(abs($a_type-$_SESSION['login_type'])==1){ 
                    ?>
                    <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-app" onclick="location.href = 'admin.php?role=<?= base64_encode($role) ?>';"><i class="fas fa-user-plus"></i><?= ($role==2) ? 'Add New Admin' : 'Add New Staff' ?></button>
                        </h3>
                    </div>
                    <?php //}
                    ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?= $lang['admin-f2'] ?> </th>
                                    <th><?= $lang['admin-f9'] ?></th>
                                    <th><?= $lang['admin-f8'] ?> </th>
                                    <th>Join Date</th>
                                    <th style="width:3%; text-align: center;"><?= $lang['Action'] ?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th><?= $lang['admin-f2'] ?> </th>
                                    <th><?= $lang['admin-f9'] ?></th>
                                    <th><?= $lang['admin-f8'] ?> </th>
                                    <th>Join Date</th>
                                    <th style="width:3%; text-align: center;"><?= $lang['Action'] ?></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($list != null) {
                                    foreach ($list as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><a href="admin?id=<?= base64_encode($row['id']); ?>"><?= ($row['f1'] == 2) ? $row['f2'] :  $row['f4']  ?></a></td>
                                            <td><?= $row['f9']; ?></td>
                                            <td><?= $row['f8']; ?></td>

                                            <td><?= printDate($row['register_date']); ?></td>
          
                                            <td><?php if ($row['status'] == '1') { ?> <button type="button" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?= $row['id'];?>', 'admins', 'id', 'admin_list','role=<?=base64_encode( $row['f1']); ?> ');"><i class="fa fa-times"></i> <?php } else { ?> <button type="button" id="btnm<?= $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?= $row['id']; ?>', 'admins', 'id', 'admin_list','role=<?=base64_encode( $row['f1']); ?>');"><i class="fa fa-check "></i> </button> <?php } ?> </td>
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