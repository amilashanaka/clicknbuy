<?php include_once './header.php';
include_once './controllers/index.php';

$form_config = $todo_page_elements;

// Decode GET parameters
$id = isset($_GET['id']) ? base64_decode($_GET['id']) : 0;
$user_id = isset($_GET['u_id']) ? base64_decode($_GET['u_id']) : 0;
$admin_id = isset($_GET['a_id']) ? base64_decode($_GET['a_id']) : 0;

// Fetch data based on id
$row = $id ? $todo->get_by_id($id)['data'] : null;
$todo_itm = $row ? $todo_items->get_by_Foreign_key($row['todo_categories'])['data'] : null;
$participants = $id ? $todo_participants->get_by_Foreign_key($id)['data'] : [];

// Prepare user IDs
$user_ids = array_map(function ($participant) use ($row) {
    return $row['f6'] == 1 ? $participant['users'] : $participant['admins'];
}, $participants);

// Set hidden input value and checkbox state
$form_config['inputs']['id']['value'] = $id;
$form_config['inputs']['f6']['checked'] = $row ? ($row['f6'] == 1) : true;

// Fetch lists
$cat_list = $todo_categories->get_all()['data'];
$user_list = $user->get_all()['data'];
$carers_list = $admin->get_all_Carers()['data'];

// Prepare category options
$category_option = array_merge([['value' => '', 'label' => '---SELECT ---']], array_map(function($item) {
    return ['value' => $item['id'], 'label' => $item['f2']];
}, $cat_list));

// Prepare todo items options if available
if ($todo_itm) {
    $form_config['inputs']['todo_items']['items'] = array_merge([['value' => '', 'label' => '---SELECT ---']], array_map(function($item) {
        return ['value' => $item['id'], 'label' => $item['f2']];
    }, $todo_itm));
}

// Prepare client options
$client_options = '';
foreach ($user_list as $item) {
    $selected = $row && $row['f6'] == 1 && in_array($item['id'], $user_ids) ? ' selected' : '';
    $client_options .= '<option value="' . $item['id'] . '"' . $selected . '>' . $item['f1'] . '</option>';
}

// Prepare carer options
$carers_options = '';
foreach ($carers_list as $item) {
    $selected = $row && $row['f6'] == 0 && in_array($item['id'], $user_ids) ? ' selected' : '';
    $carers_options .= '<option value="' . $item['id'] . '"' . $selected . '>' . $item['f6'] . '</option>';
}

// Assign category options to form config
$form_config['inputs']['todo_categories']['items'] = $category_option;


$custom_element1_checked_state = $row && $row['f4'] == 1 ? 'checked' : '';

// Custom elements

$custom_element1 = '
    <div class="col-sm-6">
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="checkbox" id="f4" name="f4" ' . $custom_element1_checked_state . '>
                <label for="f4">Recurring?</label>
                <select class="form-control" id="f5" name="f5" disabled>
                    <option value="">---SELECT ---</option>
                    <option value="1" ' . ($row && $row['f5'] == 1 ? 'selected' : '') . '>Daily</option>
                    <option value="2" ' . ($row && $row['f5'] == 2 ? 'selected' : '') . '>Weekly</option>
                    <option value="3" ' . ($row && $row['f5'] == 3 ? 'selected' : '') . '>Bi-Weekly</option>
                    <option value="4" ' . ($row && $row['f5'] == 4 ? 'selected' : '') . '>Monthly</option>
                </select>
            </div>
        </div>
    </div>';

$custom_element2 = '
    <div class="col-sm-6">
        <a href="javascript:selectAllOptions()">Assign All</a>
    </div>';

$form_config['inputs']['f4']['value'] = $custom_element1;
$form_config['inputs']['f4']['checked'] = $row ? ($row['f4'] == 1) : true;

$form_config['inputs']['assign-all']['value'] = $custom_element2;



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
        $t2 = 'New' . " " . $t2;
    } else {

        $t2 = 'Update ' . " " . $t2;
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
                                <form action="<?= $form_config['form_action'] ?>" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="update_vehicles">


                                    <div class="col-lg-12">
                                        <div class="row">
                                            <?php include_once '../inc/input_generate.php'; ?>
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

<script>
    $(document).ready(function() {
        $('#todo_categories').change(function() {
            var selectedValue = $(this).val();


            var data = {
                data: {
                    todo_categories: selectedValue,
                },
                table: "todo_items",
            };

            $.ajax({
                type: "POST",
                url: "./data/filter_data.php",
                dataType: "json",
                data: data,
                success: function(response) {

                    // Handle the response
                    var data = response.data;
                    if (data && data.length > 0) {
                        // Clear existing options
                        $('#todo_items').empty();

                        // Add a default option
                        $('#todo_items').append($('<option>', {
                            value: '',
                            text: '--- SELECT ---'
                        }));

                        // Iterate over the data array and add options for f2
                        data.forEach(function(item) {
                            $('#todo_items').append($('<option>', {
                                value: item.id,
                                text: item.f2
                            }));
                        });
                    } else {
                        // No data available, handle accordingly
                    }
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + error);
                }
            });
        });
    });
</script>


<script>

$(document).ready(function() {
        // Listen for change event on the checkbox
        $('#f4').on('change', function() {
            if ($(this).is(':checked')) {
                $('#f5').prop('disabled', false);
            } else {
                $('#f5').prop('disabled', true).val('');
            }
        });

        // Check the initial state and enable/disable the dropdown accordingly
        if ($('#f4').is(':checked')) {
            $('#f5').prop('disabled', false);
        } else {
            $('#f5').prop('disabled', true);
        }
    });
    
</script>

<script>
   $(document).ready(function() {
    $("[data-bootstrap-switch]").bootstrapSwitch();

    // Listen for change event
    $('#f6').on('switchChange.bootstrapSwitch', function(event, state) {
       
        if (state) {
            // Checkbox is checked (Clients)
            var client_options = '<?php echo $client_options; ?>';
            $('#f7').val(null).html(client_options).trigger('change'); // Clear selected options
        } else {
            // Checkbox is unchecked (Carers)
            var carers_options = '<?php echo $carers_options; ?>';
            $('#f7').val(null).html(carers_options).trigger('change'); // Clear selected options
        }
    });

    // Trigger the change event initially
    $('#f6').trigger('switchChange.bootstrapSwitch', [$('#f6').bootstrapSwitch('state')]);
});
   
</script>

<script>
    function selectAllOptions() {
        $('#f7 option').prop('selected', true); // Select all options
        $('#f7').trigger('change'); // Trigger change event for Select2 to update
    }
</script>
</body>

</html>