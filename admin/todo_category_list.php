<?php
include_once './header.php';
include_once './controllers/index.php';
$list = $todo_categories->get_all()['data'];

?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php
    $t1 = 'To Dos Type';
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
                            <div class="row">
                                <div class="col-lg-12">

                                    <a class="btn btn-app bg-success" href="todo_category.php">
                                        <i class="fas fa-plus"></i> Add New Category
                                    </a>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Description</th>                                   
                                    <th style="width:3%; text-align: center;"><?= $lang['Action'] ?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Description</th>                                    
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
                                            <td><?= $i++; ?></td>
                                            <td><a href="todo_category?id=<?= base64_encode($row['id']); ?>"><?= $row['f2'] ?></a></td>
                                            <td><?= $row['f3'] ?></td>                                                       <td> <?php if ($row['status'] == '1') { ?>
                                                <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?php echo $row['id']; ?>', 'todo_categories', 'id', 'todo_category_list');"><i class="fa fa-times" aria-hidden="true"></i>
                                                </button> <?php } else { ?> <button type="button" id="btnm<?php echo $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?php echo $row['id']; ?>', 'todo_categories', 'id', 'todo_category_list');"><i class="fa fa-check "></i></button> <?php } ?> </td>

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