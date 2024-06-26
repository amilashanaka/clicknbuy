<?php include_once './header.php';
include_once './controllers/index.php';

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
} else {
    $id = 0;
}

$user_list = $user->get_all_users()['data'];




if ($id > 0) {


    $sql = "select * from documents  where id='" . $id . "'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
   
}
?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
    $t1 =  'Document';
    $t2 = 'Details';
    if ($id == 0) {
        $t2 = 'New' . " " . $t1;
    } else {

        $t2 = 'Update Blog';
    }
    include_once './page_header.php';
    ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-body">
                            <div>
                                <form action="data/register_doc.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_vehicles">
                                    <?php
                                    if ($id == 0) {

                                        echo '<input type="hidden" name="action" value="register">';
                                        echo '<input type="hidden" name="created_dt" value="' . $today . '">';
                                        echo '<input type="hidden" name="created_by" value="' . $user_act . '">';
                                    } else {

                                        echo ' <input type="hidden" name="action" value="update">';
                                        echo ' <input type="hidden" name="id" value="' . $id . '">';
                                        echo '<input type="hidden" name="updated_dt" value="' . $today . '">';
                                        echo '<input type="hidden" name="updated_by" value="' . $user_act . '">';
                                    }
                                    ?>





                                    <div class="row form-group">

                                        <div class="col-lg-12 col-md-12 form-group">
                                            <label><?= $lang['doc-f1']; ?></label>
                                            <input type="text" class="form-control" id="f1" name="f1" value="<?= $row['f1']; ?>" required>
                                        </div>


                                    </div>

                                    <div class="row form-group">

                                        <div class="col-lg-12 col-md-12 form-group">
                                            <label><?= $lang['doc-f2']; ?></label>
                                            <!-- <input type="text" class="form-control" id="f2" name="f2" value="<?= $row['doc-user']; ?>" required> -->
                                            <select name="user" id="user" class="form-control simple-select">

                                                <?php

                                                foreach ($user_list as $op) {
                                                    echo '<option selected=' . $op['id'] . '>' . $op['f1'] . '</option>';

                                                }



                                                ?>



                                            </select>
                                        </div>


                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label"><?= $lang['doc-f2']; ?></label>
                                            <input class="form-control" type="file" id="f2" name="f2">
                                        </div>

                                    </div>




                                    <hr>



                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-2 form-group">


                                            <?php
                                            if ($id > 0) {


                                                echo '<button type="submit" class="btn btn-block btn-outline-success">Update Now</button>';
                                            } else {


                                                echo '<button type="submit" class="btn btn-block btn-outline-secondary">ADD New</button>';
                                            }
                                            ?>



                                        </div>
                                        <div class="col-lg-2 col-md-2 form-group">
                                            <button type="reset" class="btn btn-block btn-outline-warning">Reset</button>
                                        </div>


                                    </div>

                                </form>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>






                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php include_once './footer.php'; ?>


<script>
    $('#browse_image').on('click', function(e) {

        $('#img_file').click();
    });
    $('#img_file').on('change', function(e) {
        var fileInput = this;
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>


<script>
    $('#browse_icon').on('click', function(e) {



        $('#icon_file').click();
    });
    $('#icon_file').on('change', function(e) {
        var fileInput = this;
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#icon').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>



</body>

</html>