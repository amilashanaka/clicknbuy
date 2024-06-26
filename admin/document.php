<?php include_once './header.php';
include_once './controllers/index.php';
$form_config = $document_page_element;


if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $row = $doc->get_by_id($id)['data'];
} else {
    $id = 0;
    $row = null;
}

if (isset($_GET['u_id'])) {
    $u_id = base64_decode($_GET['u_id']);
} else {
    $u_id = 0;
}


$user_list = $user->get_all()['data']; // or $my_clients ->get_clients_by_admin( $u_id)['data'];


$Client_selection[] = array('value' => '', 'label' => '---SELECT ---');
foreach ($user_list as $item) {

    $Client_selection[] = array(
        'value' => $item['id'],    // Assuming 'id' is the key for the value in $cat
        'label' => $item['f1'],  // Assuming 'name' is the key for the label in $cat
    );
}
$form_config['inputs']['user']['items'] = $Client_selection;

//

$form_config['inputs']['id']['value'] = $id;






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
                                <form action="<?= $form_config['form_action'] ?>" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="doc">



                                    <div class="col-lg-12">
                                        <div class="row">

                                            <?php include_once '../inc/input_generate.php'; ?>
                                        </div>

                                    </div>




                                    <?php if ($row  &&  $row['f2'] != '' &&  $row['f3'] == 'file') {  ?>
                                        <div class="col-lg-6 col-md-6 ">
                                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                <li>
                                                    <span class="mailbox-attachment-icon"><i class="far fa-file"></i></span>
                                                    <div class="mailbox-attachment-info bg-gray">
                                                        <a href="view_file?file=<?= base64_encode($row['f2']); ?>" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> File</a>
                                                        <span class="mailbox-attachment-size clearfix mt-1">
                                                            <a href="<?= $row['f2'] ?>" download><i class="fas fa-download fs-3 float-right "></i></a>
                                                        </span>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                    <?php }  ?>

                                    <?php if ($row  &&  $row['f2'] != '' &&  $row['f3'] == 'image') {  ?>
                                        <div class="col-lg-6 col-md-6 ">
                                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                <li>
                                                    <span class="mailbox-attachment-icon has-img"><img src="<?= $row['f2'] ?>" alt="Attachment"></span>

                                                    <div class="mailbox-attachment-info bg-gray">
                                                        <a href="view_file?file=<?= base64_encode($row['f2']); ?>" class="mailbox-attachment-name"><i class="fas fa-camera"></i> image</a>
                                                        <span class="mailbox-attachment-size clearfix mt-1">


                                                            <a href="<?= $row['f2'] ?>" download> <i class="fas fa-download fs-3 float-right"></i> </a>
                                                        </span>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                    <?php }  ?>









                                    <div class="col-lg-6 col-md-6 ">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-u_id="<?= base64_encode($u_id) ?>" data-docid="<?= base64_encode($id) ?>">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Camera</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 ">
                                        <div class="row form-group">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label"><?= $lang['doc-f2']; ?></label>
                                                <input class="form-control" type="file" id="f2" name="f2">
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const checkbox = document.getElementById('flexSwitchCheckDefault');

                                            checkbox.addEventListener('change', function() {
                                                if (this.checked) {
                                                    const client_id = this.getAttribute('data-u_id');

                                                    const form = document.forms['doc'];
                                                    const formData = new FormData(form);

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "./data/register_doc_cam.php",
                                                        data: formData,
                                                        processData: false,
                                                        contentType: false,
                                                        dataType: "json",
                                                        success: function(response) {


                                                            window.location.href = `camera.php?u_id=${client_id}&id=${response.inserted_id}`;
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error('Error:', error);
                                                        }
                                                    });



                                                }
                                            });
                                        });
                                    </script>



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