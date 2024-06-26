<?php include_once './header.php';
include_once './controllers/index.php';
$form_config = $support_plan_page_elements;


if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $row = $support_plan->get_by_id($id)['data'];
} else {
    $id = 0;
    $row = null;
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
    $t1 =  $form_config['heading'];
    $t2 = 'Details';
    if ($id == 0) {
        $t2 = 'New' . " " . $t1;
    } else {

        $t2 = 'Update' . " " . $t1;
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
                                <form action="<?= $form_config['form_action'] ?>" class="templatemo-login-form" method="post" enctype="multipart/form-data" >
                                    <?php

                                    if ($id == 0) {

                                     
                                        echo '<input type="hidden" name="created_by" value="' . $user_act . '">';
                                    } else {

                                      
                                        echo '<input type="hidden" name="updated_by" value="' . $user_act. '">';
                                    }
                                    ?>
     

                                    <?php include_once '../inc/input_generate.php';?>
                                    

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
 
</body>

</html>