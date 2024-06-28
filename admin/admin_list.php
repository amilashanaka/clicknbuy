<?php
include_once './header.php';

include_once './controllers/index.php';

$form_config = $admin_list_page_element;

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

    $t1 = $form_config['t1'];
    $t2 = $form_config['t2'];

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
                            <button type="button" class="btn btn-app" onclick="location.href = '<?php echo $form_config['new']; ?>?role=<?php echo base64_encode($role); ?>';">
                                <i class="fas fa-user-plus"></i> <?php echo ($role == 2) ? 'Add New Admin' : 'Add New Staff'; ?>
                            </button>
                        </h3>
                    </div>
                    <?php //}
                    ?>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php
                        if ($form_config['table'] != null) {
                        ?>

                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <?php
                                        foreach ($form_config['table']['th'] as $header) {
                                            if ($header == 'Action') {
                                                echo '<th style="width:3%; text-align: center;">' . $header . '</th>';
                                            } else {
                                                echo '<th>' . $header . '</th>';
                                            }
                                        }
                                        ?>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <?php
                                        foreach ($form_config['table']['th'] as $header) {
                                            if ($header == 'Action') {
                                                echo '<th style="width:3%; text-align: center;">' . $header . '</th>';
                                            } else {
                                                echo '<th>' . $header . '</th>';
                                            }
                                        }
                                        ?>
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
                                                <td><a href="<?php $form_config['new'] ?>?id=<?= base64_encode($row['id']); ?>"><?= ($row['f1'] == 2) ? $row['f2'] :  $row['f4']  ?></a></td>
                                                <td><?= $row['f9']; ?></td>
                                                <td><?= $row['f8']; ?></td>

                                                <td><?= printDate($row['register_date']); ?></td>

                                                <td> <?php if ($row['status'] == '1') { ?>
                                                        <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?php echo $row['id']; ?>', '<?php echo  $form_config['tbl']; ?>', 'id','<?php echo  $form_config['redirect']; ?>','role=<?=base64_encode( $row['f1']); ?> ');"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    <?php } else { ?>
                                                        <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?php echo $row['id']; ?>', '<?php echo  $form_config['tbl']; ?>', 'id', '<?php echo  $form_config['redirect']; ?>','role=<?=base64_encode( $row['f1']); ?> ');"><i class="fa fa-check "></i></button>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>
                            </table>


                        <?php

                        }

                        ?>

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