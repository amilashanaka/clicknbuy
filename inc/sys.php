<?php



$infobox=array(
    '1'=>array(
        'caption'=>'ToDos',
        'icon'=>'fas fa-calendar-check',
        'bg'=>'bg-info',
        'url'=>'todo_list',
    ),
    '2'=>array(
        'caption'=>'Reports',
        'icon'=>'fas fa-heartbeat',
        'bg'=>'bg-danger',
        'url'=>'reports',
    ),
    '3'=>array(
        'caption'=>'Medication',
        'icon'=>'fas fa-pills',
        'bg'=>'bg-success',
        'url'=>'med_list',
    ),
    '4'=>array(
        'caption'=>'Staff',
        'icon'=>'fas fa-user-md ',
        'bg'=>' bg-warning',
        'url'=>'admin_list',
    ),

);                                     



// System configeration
$notification_icons=array(
    'To-Dos'=>'fas fa-boxes',
    'To-Dos1'=>'fas fa-user-md'
);
$notification_icons_json = json_encode($notification_icons); // to javascript

$admin_list_page_element = array(
    'heading' => 'Admin List',
    'new' => 'admin',
    'table' => array(
        'th' => array('User Name', 'e-mail','Mobile number','Join Date','Action'           
        ),      
    ),
    'tbl'=>'admins',
    'redirect'=>'admin_list',
    't1'=>'Admin User',
    't2'=>'list',
);


$log_page_elements = array(
    'heading' => 'Log',
    'form_action' => 'data/register_log.php',
    'inputs' => array(      
        'id' => array(
            'type' => 'h',
            'value' => '',
        ),
        'f1' => array(
            'label' => 'Title',
            'type' => 'text',
            'class' => 'form-control',
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),
        'f2' => array(
            'label' => 'Description',
            'type' => 'textarea',
            'required' => 'required',
            'class' => 'form-control summernote',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),

    ),
);


$allergy_page_elements = array(
    'heading' => 'Alergy',
    'form_action' => 'data/register_allergy.php',
    'inputs' => array(      
        'id' => array(
            'type' => 'h',
            'value' => '',
        ),
        'f1' => array(
            'label' => 'Name',
            'type' => 'text',
            'class' => 'form-control',
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        )

    ),
);


$doctor_page_elements = array(
    'heading' => 'Doctor',
    'form_action' => 'data/register_doctor.php',
    'inputs' => array(      
        'id' => array(
            'type' => 'h',
            'value' => '',
        ),
        'f1' => array(
            'label' => 'Name',
            'type' => 'text',
            'class' => 'form-control',
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),
        'f2' => array(
            'label' => 'Note',
            'type' => 'text',
            'class' => 'form-control',
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        )

    ),
);





$Todo_category_page_elements = array(
    'heading' => 'Category',
    'form_action' => 'data/register_todocategory.php',
    'inputs' => array(
        'f1' => array(
            'label' => 'Icon',
            'type' => 'image',
            'skip' => true,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),
        'f2' => array(
            'label' => 'Category Name',
            'type' => 'text',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),
        'f3' => array(
            'label' => 'Description',
            'type' => 'textarea',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),

    ),
);

//define all variables of thetodo items
$todo_items_page_elements = array(
    'heading' => 'Items',
    'form_action' => 'data/register_todo_items.php',
    'inputs' => array(
        'f1' => array(
            'label' => 'Icon',
            'type' => 'image',
            'skip' => true,
            'div_class' => 'col-lg-6 col-md-12 form-group',
        ),
        'todo_categories' => array(
            'label' => 'Category',
            'type' => 'combobox',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-6 col-md-12 form-group',
        ),
        'f2' => array(
            'label' => 'Item Name',
            'type' => 'text',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'div_class' => 'col-lg-6 col-md-12 form-group',
        ),
        'f3' => array(
            'label' => 'Description',
            'type' => 'textarea',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),

    ),
);

//define all variables of todo
//define all variables of todo
$todo_page_elements = array(
    'heading' => 'Todo',
    'form_action' => 'data/register_todos.php',
    'inputs' => array(
        'id' => array(
            'type' => 'h',
            'value' => '',
        ),
        'f1' => array(
            'label' => 'Title',
            'type' => 'text',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'div_class' => 'col-lg-12 col-md-12 form-group',
        ),
        'todo_categories' => array(
            'label' => 'Category Name',
            'type' => 'combobox',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'div_class' => 'col-lg-6 form-group',
        ),
        'todo_items' => array(
            'label' => 'Item Name',
            'type' => 'combobox',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(
                array('value' => '', 'label' => '---SELECT ---')
            ),
            'skip' => false,
            'div_class' => 'col-lg-6 form-group',
        ),
        'f2' => array(
            'label' => 'Start',
            'type' => 'datetime',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-3 col-md-6 form-group',
        ),
        'f3' => array(
            'label' => 'End',
            'type' => 'datetime',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
            'div_class' => 'col-lg-3 col-md-6 form-group',
        ),
        'f4' => array(
            'label' => 'Recurring? - checkbox',
            'type' => 'custom',
            'value' => '',
            'checked' => true,
            'skip' => false,

        ),
        'f5' => array(
            'label' => 'Recurring options',
            'type' => 'combobox',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(
                array('value' => '', 'label' => '---SELECT ---'),
                array('value' => '1', 'label' => 'Daily'),
                array('value' => '2', 'label' => 'Weekly'),
                array('value' => '3', 'label' => 'Bi-Weekly'),
                array('value' => '4', 'label' => 'Monthly')
            ),
            'skip' => true,
        ),
        'f6' => array(
            'type' => 'switch',
            'label' => array('Clients', 'Carers'),
            'color' => array('success', 'primary'),
            'checked' => true,
            'skip' => false,
            'div_class' => 'col-lg-5 col-md-6 form-group',
        ),

        'assign-all' => array(
            'type' => 'custom',
            'value' => '',
            'skip' => false
        ),
        'f7' => array(
            'type' => 'multy-select',
            'required' => 'required',
            'dropdown-color' => 'success',
            'selected-color' => 'success',
            'div_class' => 'col-lg-6 col-md-6 form-group',          
            'items' => array(),
            'skip' => false,
        ),
        'h-element' => array(
            'label' => 'Note',
            'type' => 'custom',
            'value' => ' <h5 class="text-divider">Note</span></h5>',
            'skip' => false,

        ),
        'f8' => array(
            'label' => '',
            'type' => 'textarea', 
            'class' => 'form-control  summernote',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 10,
            'div_class' => 'col-lg-12 form-group',
        ),

    ),
);




//sample

$sample_page_elements = array(
    'heading' => 'Category',
    'inputs' => array(
        'f1' => array(
            'label' => 'Icon',
            'type' => 'image',
            'skip' => true,
        ),
        'f2' => array(
            'label' => 'Category Name',
            'type' => 'text',
            'pattern' => '[A-Z0-9]*',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
        ),
        'f3' => array(
            'label' => 'Description',
            'type' => 'textarea',
            'pattern' => '',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(),
            'skip' => false,
            'rows'  => 5,
        ),
        'f4' => array(
            'label' => 'Agree to Terms',
            'type' => 'checkbox',
            'required' => 'required',
            'class' => 'form-check-input',
            'checked' => true,
            'items' => array(),
            'skip' => false,
        ),
        'f5' => array(
            'label' => 'Select Option',
            'type' => 'combobox',
            'required' => 'required',
            'class' => 'form-control',
            'value' => '',
            'items' => array(
                array('value' => '1', 'label' => 'Option 1'),
                array('value' => '2', 'label' => 'Option 2'),
                array('value' => '3', 'label' => 'Option 3'),
            ),
            'skip' => false,
        )
    ),
);


 // side menu
$side_menu = array();

array_push($side_menu, array( 'name' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'url' => '/' ,'active' => 'active', 'menu'=>'menu-open', 'submenu' => ''));
array_push($side_menu, array( 'name' => 'STAFF', 'icon' => 'fas fa-user-md', 'url' => 'admin_list', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Admins', 'icon' => 'fas fa-list', 'url' => 'admin_list?role=Mg=='), array('name' => 'Carer List', 'icon' => 'fas fa-list', 'url' => 'admin_list?role=Mw=='),array('name' => 'Shift Management', 'icon' => 'fas fa-list', 'url' => 'shift_list?role=Mg=='))));
array_push($side_menu, array( 'name' => 'Client', 'icon' => 'fas fa-users', 'url' => 'admin_list', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'List', 'icon' => 'fas fa-list', 'url' => 'user_list?role=MQ=='), array('name' => 'Documents', 'icon' => 'far fa-file-pdf', 'url' => 'document_list'),array('name' => 'Medication', 'icon' => 'fas fa-pills', 'url' => 'med_list'),array('name' => 'Risk Assessments', 'icon' => 'fas fa-heartbeat', 'url' => 'risk_list'))));
array_push($side_menu, array( 'name' => 'To-Dos', 'icon' => ' fas fa-boxes', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'List', 'icon' => 'fas fa-list', 'url' => 'todo_list'), array('name' => 'Categories', 'icon' => 'fas fa-list', 'url' => 'todo_category_list'),array('name' => 'Items', 'icon' => 'fas fa-list', 'url' => 'todo_item_list'))));
array_push($side_menu, array( 'name' => 'Logs', 'icon' => ' fas fa-book', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Add Logs', 'icon' => 'fas fa-briefcase-medical', 'url' => 'log_list'), array('name' => 'View Logs', 'icon' => 'fas fa-user-nurse', 'url' => 'log_view_list'))));
array_push($side_menu, array( 'name' => 'Food', 'icon' => 'fas fa-hamburger', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Allergies', 'icon' => 'fas fa-list', 'url' => 'allergies_list'), array('name' => 'Client Allergis', 'icon' => 'fas fa-list', 'url' => 'client_allergies_list')) ));
array_push($side_menu, array( 'name' => 'Medical', 'icon' => '	fas fa-medkit', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Doctors ', 'icon' => 'fas fa-list', 'url' => 'doctor_list'), array('name' => 'Dentist', 'icon' => 'fas fa-list', 'url' => 'dentist_list')) ));
array_push($side_menu, array( 'name' => 'Housing', 'icon' => '	fas fa-home', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Benefits ', 'icon' => 'fas fa-list', 'url' => 'benifit_list'), array('name' => 'Dentist', 'icon' => 'fas fa-list', 'url' => 'dentist_list')) ));
array_push($side_menu, array( 'name' => 'Finance', 'icon' => 'fas fa-landmark', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Banking ', 'icon' => 'fas fa-list', 'url' => 'client_fin_list'), array('name' => 'Invoices', 'icon' => 'fas fa-list', 'url' => 'invoices_list_by_client'),array('name' => 'Pension', 'icon' => 'fas fa-hand-holding-usd', 'url' => 'pension_list_by_client')) ));
// settings menu----
array_push($side_menu, array( 'name' => 'Settings', 'icon' => '	fas fa-cog', 'url' => '#', 'active' => '' , 'menu'=>'','submenu' => array( array('name' => 'Permissions', 'icon' => 'fas fa-list', 'url' => 'permissions_list'), array('name' => 'App', 'icon' => 'fas fa-list', 'url' => 'app_settings')) ));

//Logout button
array_push($side_menu, array( 'name' => 'Log Out', 'icon' => ' fas  fa-sign-out-alt', 'url' => 'javascript:logout()' ,'active' => '', 'menu'=>'', 'submenu' => ''));
 

//------------------------------------------------------

$sys = array();

$sys['APP_NAME']                                   = 'Click N BUY';
$sys['APP_F_NAME']                                 = 'CHMS';
$sys['APP_L_NAME']                                 = 'CHMS';
$sys['System Name']                                = 'CHMS Admin';
$sys['System Section']                             = 'Care Home Management System Admin';
$sys['SYSTEM']                                     = 'ADMINISTRATION PLATFORM';
$sys['LOGIN']                                      = 'LOGIN';
$sys['LOGOUT']                                     = 'Log Out';
$sys['Admin User']                                 = 'Admin User';
$sys['List']                                       = 'List';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
$sys['']                                           = '';
                             
// user settings --------------------------------------------------------------------

$sys['user-tab-1']                                  = 'Profile';
$sys['user-tab-2']                                  = 'Other';
$sys['user-tab-3']                                  = 'Guardian';
$sys['user-tab-4']                                  = 'Documents';
$sys['user-tab-5']                                  = 'Medication';
$sys['user-tab-6']                                  = 'Food';

$sys['user-f1']                                            = 'Name';
$sys['user-f2']                                            = 'Date of birth';
$sys['user-f3']                                            = 'Gender';
$sys['user-f4']                                            = 'Mobile number';
$sys['user-f5']                                            = 'NHS number';
$sys['user-f6']                                            = 'National Insurance number';
$sys['user-f7']                                            = 'Address';

$sys['user-f8']                                            = 'Ethnicity';
$sys['user-f9']                                            = 'Birthplace';

$sys['user-f10']                                            = 'Myself';

$sys['user-f11']                                            = 'Guardian Name';
$sys['user-f12']                                            = 'Guardian Relationship';
$sys['user-f13']                                            = 'Guardian - contact number';
$sys['user-f14']                                            = 'Guardian - Address';
$sys['user-f15']                                            = 'Next Of King';
$sys['user-f16']                                            = 'Marital status';

//-----------------------------------------------------------------------------------------


// admin settings --------------------------------------------------------------------

$sys['admin-tab-1']                                            = 'Profile';
$sys['admin-tab-2']                                            = 'Reset Password';
$sys['admin-tab-3']                                            = 'My Clients';
$sys['admin-tab-4']                                            = 'Documents';
$sys['admin-tab-5']                                            = 'Medication';


$sys['admin-f1']                                             = 'Role';
$sys['admin-f2']                                             = 'User Name';
$sys['admin-f3']                                             = 'Password';
$sys['admin-f4']                                             = 'Staff Id';
$sys['admin-f5']                                             = 'pin';
$sys['admin-f6']                                             = 'Name';
$sys['admin-f7']                                             = 'Gender';
$sys['admin-f8']                                             = 'Mobile number';
$sys['admin-f9']                                             = 'e-mail';
$sys['admin-f10']                                            = 'Address';
$sys['admin-f11']                                            = 'National Insurance number';
$sys['admin-f12']                                            = '';
$sys['admin-f13']                                            = '';
$sys['admin-f14']                                            = '';
$sys['admin-f15']                                            = '';
$sys['admin-f16']                                            = '';

//-----------------------------------------------------------------------------------------








//---------- Documents ----------------------------------------------------------------

$sys['doc-f1']                                            = 'Name';
$sys['doc-f2']                                            = 'File';
$sys['doc-user']                                          = 'Client';



//------- Logs ----------------------------------------------------------------

$sys['log-f1']                                            = 'Title';
$sys['log-f2']                                            = 'Note';
$sys['log-user']                                          = 'Client';
$sys['log-staff']                                         = 'Staff';

//------------ Medication -------------------------------------------------------

$sys['med-f1']                                            = 'Name';
$sys['med-f2']                                            = 'Dose';
$sys['med-f3']                                            = 'Rounds Total';
$sys['med-f4']                                            = 'Rounds to Be Given';
$sys['med-f5']                                            = 'Time to Be Given';
$sys['med-f6']                                            = 'Frequency to Be Given';
$sys['med-user']                                          = 'Client';
$sys['med-staff']                                         = 'Staff';

//--------------- Food ----------------------------------------------------

$sys['alagi-f1']                                            = 'Name';
$sys['alagi-f2']                                            = 'Dose';
$sys['alagi-f3']                                            = 'Rounds Total';
$sys['alagi-f4']                                            = 'Rounds to Be Given';
$sys['alagi-f5']                                            = 'Time to Be Given';
$sys['alagi-f6']                                            = 'Frequency to Be Given';
$sys['alagi-user']                                          = 'Client';



