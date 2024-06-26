<?php include_once './header.php';
$profile_image = null;

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    if ($id > 0) {
        $row = $user->getUserById($id)['user'];
        if ($doc->get_by_user($id)['error'] == null) {
            $doc_list = $doc->get_Doc_by_user($id)['data'];
        } else {
            $doc_list = null;
        }

        if ($row['img1']  && $row['img1'] != '') {
            $profile_image = $row['img1'];
        }
    }

    
    if ($med->get_med_ny_user($id)['error'] == null) {
        $med_list = $med->get_med_ny_user($id)['data'];
    } else {
        $med_list = null;
    }
     
} else {
    $id = 0;
    $row = null;
    $doc_list = null;
}


?>

<?php include_once './navbar.php'; ?>

<?php include_once './sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php

    $t1 = $lang['SM3'];
    $t2 = $lang['List'];

    include_once './page_header.php';

    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile fs-6">
                            <div class="text-center">

                                <input type="file" class="filepond" name="filepond" accept="image/png, image/jpeg, image/gif" />

                            </div>
                            <h3 class="profile-username text-center"><?= ($row == null) ? "" : $row['f1']; ?></h3>
                            <p class="text-muted text-center"><?= ($row == null) ? "" : printDate($row['f2']); ?> </p>
                            <ul class="list-group list-group-unbordered mb-3">

                                <li class="list-group-item"> <b>Gender</b> <a class="float-right"><?= ($row == null) ? "" : $row['f3']; ?></a> </li>

                                <li class="list-group-item"><b>Age</b> <a class="float-right"> <?= ($row == null) ? "" : calculateAge($row['f2']) ?></a></li>
                                <li class="list-group-item"><b><?= $lang['user-f2'] ?></b> <a class="float-right"><?= ($row == null) ? "" : printDate($row['f2']); ?></a></li>
                                <li class="list-group-item"><b><?= $lang['user-f16'] ?></b> <a class="float-right"><?= ($row == null) ? "" : $row['f16']; ?></a></li>
                                <li class="list-group-item"><b><?= $lang['user-f8'] ?></b> <a class="float-right"><?= ($row == null) ? "" : $row['f8']; ?></a></li>
                                <li class="list-group-item"> <b><?= $lang['user-f9'] ?></b> <a class="float-right"><?= ($row == null) ? "" : $row['f9']; ?></a></li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

                <div class="col-md-9  fs-10">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <?php if ($id == 0) { ?>
                                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab"><?= $lang['user-tab-1'] ?></a></li>

                                <?php } else { ?>
                                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab"><?= $lang['user-tab-1'] ?></a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-2" data-toggle="tab"><?= $lang['user-tab-2'] ?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab"><?= $lang['user-tab-3'] ?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab"><?= $lang['user-tab-4'] ?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-5" data-toggle="tab"><?= $lang['user-tab-5'] ?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-6" data-toggle="tab"><?= $sys['user-tab-6'] ?></a></li>
                                <?php } ?>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="tab-1">


                                    <form action="data/register_user.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="update_members">

                                        <input type="hidden" name="register_by" value="<?= $_SESSION['login'] ?>">
                                        <input type="hidden" name="id" value="<?= $id; ?>">


                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f1'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f1'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="f1" placeholder="<?= $lang['user-f1'] ?>" value="<?= ($row == null) ? "" : $row['f1']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f2'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f2'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="f2" placeholder="<?= $lang['user-f2'] ?>" value="<?= ($row == null) ? "" : $row['f2']; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f3'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f3'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f3'] ?>" name="f3" value="<?= ($row == null) ? "" : $row['f3']; ?>">
                                            </div>
                                        </div>





                                        <div class="col-lg-12 col-md-12 form-group">
                                            <div class="row">

                                                <?php if ($id == 0) { ?>

                                                    <div class="col-lg-3 col-md-3 form-group">
                                                        <button type="submit" name="add_new_Submit" class="btn btn-block btn-danger">Add New</button>
                                                    </div>


                                                <?php } else { ?>

                                                    <div class="col-lg-3 col-md-3 form-group">
                                                        <button type="submit" class="btn btn-block btn-success">Update
                                                            Now</button>
                                                    </div>

                                                <?php } ?>
                                                <div class="col-lg-3 col-md-3 form-group">
                                                    <button type="reset" class="btn btn-block btn-warning">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane" id="tab-2">
                                    <!-- The timeline -->

                                    <form action="data/register_user.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="more_details">


                                        <input type="hidden" name="update_by" value="<?= $user_act ?>">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?= $id; ?>">

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f4'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f4'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f4'] ?>" name="f4" value="<?= $row['f4']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f5'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f5'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f5'] ?>" name="f5" value="<?= $row['f5']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f6'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f6'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f6'] ?>" name="f6" value="<?= $row['f6']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f7'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f7'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f7'] ?>" name="f7" value="<?= $row['f7']; ?>" required>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f8'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f8'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f8'] ?>" name="f8" value="<?= $row['f8']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f9'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f9'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f9'] ?>" name="f9" value="<?= $row['f9']; ?>" required>
                                            </div>
                                        </div>





                                        <h5 class="text-divider"> <?= $lang['user-f10'] ?></span></h5>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 form-group">

                                                <textarea type="text" class="form-control  summernote" name="f10"><?= $row['f10']; ?></textarea>
                                            </div>



                                        </div>









                                        <div class="col-lg-12 col-md-12 form-group">
                                            <div class="row">

                                                <div class="col-lg-3 col-md-3 form-group">
                                                    <button type="submit" class="btn btn-block btn-success">Update
                                                        Now</button>
                                                </div>



                                                <div class="col-lg-3 col-md-3 form-group">
                                                    <button type="reset" class="btn btn-block btn-warning">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab-3">
                                    <!-- The timeline -->



                                    <form action="data/register_user.php" class="form-horizontal" method="post" enctype="multipart/form-data" name="more_details">

                                        <input type="hidden" name="update_by" value="<?= $user_act ?>">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?= $id ?>">

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f11'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f11'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f11'] ?>" name="f11" value="<?= $row['f11']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f12'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f12'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f12'] ?>" name="f12" value="<?= $row['f12']; ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f13'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f13'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f13'] ?>" name="f13" value="<?= $row['f13']; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f14'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f14'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f14'] ?>" name="f14" value="<?= $row['f14']; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f15'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f15'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f15'] ?>" name="f15" value="<?= $row['f15']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="<?= $lang['user-f16'] ?>" class="col-sm-2 col-form-label"><?= $lang['user-f16'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="<?= $lang['user-f16'] ?>" name="f16" value="<?= $row['f16']; ?>">
                                            </div>
                                        </div>




                                        <div class="col-lg-12 col-md-12 form-group">
                                            <div class="row">

                                                <div class="col-lg-3 col-md-3 form-group">
                                                    <button type="submit" class="btn btn-block btn-success">Update
                                                        Now</button>
                                                </div>



                                                <div class="col-lg-3 col-md-3 form-group">
                                                    <button type="reset" class="btn btn-block btn-warning">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane" id="tab-4">
                                    <!-- The timeline -->

                                    <div class="col-12">
                                        <!-- /.card -->
                                        <div class="card">

                                            <!--<div class="card-header">
                                                <h3 class="card-title">
                                                    <div class="row">
                                                        <div class="col6">
                                                            <button type="button" class="btn btn-app" onclick="location.href = 'document?u_id=<?= base64_encode($id) ?>';"><i class="fas fa-clipboard"></i>Add New</button>
                                                        </div>
                                                    </div>
                                                </h3>
                                            </div>-->

                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Create By</th>
                                                            <th>File Download</th>
                                                            <th>File View</th>
                                                            <th>Date Created</th>


                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Create By</th>
                                                            <th>File Download</th>
                                                            <th>File View</th>
                                                            <th>Date Created</th>


                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        if ($doc_list != null) {
                                                            foreach ($doc_list as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $i++; ?></td>
                                                                    <td><a href="document?id=<?= base64_encode($row['id']); ?>"><?= $row['f1'] ?></a></td>


                                                                    <td><?= $admin->get_name_by_id($row['created_by']); ?></td>
                                                                    


                                                                    <td class="text-center"><a href="<?= $row['f2'] ?>" download> <i class="fas fa-download fs-5 align-self-center"></i> </a> </td>
                                                                    <td class="text-center"><a href="view_file?file=<?= base64_encode($row['f2']); ?>" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> </a></td>

                                                                    <td><?php echo printDate($row['created_date']); ?></td>
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

                                <div class="tab-pane" id="tab-5">
                                    <!-- The timeline -->

                                    <div class="col-12">
                                        <!-- /.card -->
                                        <div class="card">

                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <div class="row">
                                                        <div class="col6">
                                                            <button type="button" class="btn btn-app" onclick="location.href = 'document?u_id=<?= base64_encode($id) ?>';"><i class="fas fa-pills"></i>Add New</button>
                                                        </div>
                                                    </div>
                                                </h3>
                                            </div>

                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Given By</th>
                                                            <th>Dose</th>
                                                            <th>Date & Time</th>

                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Given By</th>
                                                            <th>Dose</th>
                                                            <th>Date & Time</th>

                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        if ($med_list != null) {
                                                            foreach ($med_list as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $i++; ?></td>
                                                                    <td><a href="med?id=<?= base64_encode($row['id']); ?>"><?= $row['f1'] ?></a></td>                                                                   
                                                                    <td><?php echo ($row['updated_by'] > 0) ? $admin->get_name_by_id($row['updated_by']) : $admin->get_name_by_id($row['created_by']); ?></td>
                                                                    <td><?= $row['f2'] ?></td>
                                                                    <td><?php echo ($row['updated_by'] > 0) ? printDate($row['updated_date']) : printDate($row['created_date']); ?></td>
                                                                    <td><?php if ($row['status'] == '1') { ?> <button type="button" class="btn btn-block btn-outline-danger btn-flat" onclick="delete_record('<?= $row['id']; ?>', 'documents', 'id', 'document_list');"><i class="fa fa-times"></i> <?php } else { ?> <button type="button" id="btnm<?= $row['id']; ?>" class="btn btn-block btn-outline-success btn-flat" onclick="activate_record('<?= $row['id']; ?>', 'documents', 'id', 'document_list');"><i class="fa fa-check "></i> </button> <?php } ?> </td>
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


                                <div class="tab-pane" id="tab-6">
                                    <!-- The timeline -->

                                    <div class="col-12">
                                        <!-- /.card -->
                                        <div class="card">

                                            <p> Show here alegies , food favour related food info</p>


                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>

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
    const imagePath = '<?php echo $profile_image; ?>';
    const userId = '<?php echo $id; ?>'; // Ensure this is correctly set in PHP
    const hasImage = Boolean(imagePath); // Set hasImage based on whether imagePath is provided

    // Register the FilePond plugins
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    // Create FilePond instance
    const pond = FilePond.create(
        document.querySelector('.filepond'), {
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
            files: hasImage ? [{
                source: imagePath,
                options: {
                    type: 'image'
                }
            }] : []
        }
    );

    // Configure server options dynamically
    const setServerOptions = () => {
        pond.setOptions({
            server: {
                process: {
                    url: './data/upload_profile_pic.php',
                    method: 'POST',
                    withCredentials: false,
                    headers: {},
                    timeout: 7000,
                    onload: (response) => response, // This is where file.serverId is set
                    onerror: (response) => response,
                    ondata: (formData) => {
                        // Append additional data to the formData
                        formData.append('id', userId);
                        formData.append('target', 'users');
                        return formData;
                    }
                }
            }
        });
    };

    // Catch the response from the server after a file has been processed
    pond.on('processfile', (error, file) => {
        if (error) {
            console.error('Error processing file:', error);
            return;
        }
        const serverResponse = file.serverId;
        try {
            const response = JSON.parse(serverResponse);
            if (response.status === 'success') {
                console.log('File uploaded successfully');
                // You can use response.filePath to do something with the uploaded file path
            } else {
                console.error('File upload error:', response.message);
            }
        } catch (e) {
            console.error('Failed to parse server response:', serverResponse);
        }
    });

    // Handle the addfile event to ensure new files are processed
    pond.on('addfile', (error, file) => {
        if (error) {
            console.error('Error adding file:', error);
            return;
        }

        // If a new file is added, set the server configuration
        setServerOptions();
    });

    // Initialize server options if no initial image is provided
    if (!hasImage) {
        setServerOptions();
    }
</script>



</body>

</html>