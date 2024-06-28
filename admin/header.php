<?php
include_once '../inc/auth.php';
include_once './session.php';
#include_once '../common.php';
include_once '../inc/functions.php';
include_once '../inc/sys.php';
include_once './controllers/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $lang['System Name'] ?></title>

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


    <!--  Data Tables -->

    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=".assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

 
   <!-- fullCalendar -->
  <link rel="stylesheet" href="assets/plugins/fullcalendar/main.css">


    <!-- summer note -->
    <link href="assets/plugins/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />

    <!-- bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- js -->

    <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
    <script src="assets/js/error_list.js" type="text/javascript"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <!--filepond -->

    <link rel="stylesheet" href="assets/plugins/filepond/filepond.min.css">
    <link rel="stylesheet" href="assets/plugins/filepond/FilePondPluginImagePreview.min.css">


    

    <style>
        /*@media screen and (max-width: 768px) {
    .dt-buttons {
        display: none;
    }
}*/
        @media screen and (max-width: 1060px) {
            .btn-csv {
                display: none;
            }
        }


        /* hide specific buttons*/
        @media screen and (max-width: 760px) {

            .btn-csv,
            .btn-excel,
            .btn-pdf,
            .btn-print,
            .dataTables_filter,
            .dataTables_searching {
                display: none;
            }

        }

        .filepond--root {
            width: 170px;
            margin: 0 auto;
        }

        .filepond--drop-label {
            font-size: 14px;
            /* Adjust the font size for the label text */
        }
    </style>
</head>

<body class="hold-transition   sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <?php




    if (!isset($_SESSION['login'])) {
        header('Location: index');
        exit();
    } else {

        $user_act =  $_SESSION['login'];
        $user_role = $_SESSION['role'];
        $today = date("Y-m-d H:i:s");
        $user_details = $admin->getAdminById($user_act)['admin'];
       
    }


    ?>


    <?php
    if (isset($_GET['error'])) {
        $error = base64_decode($_GET['error']);
        echo '<script>  error_by_code(' . $error . ');</script>';
    }

    if (isset($_GET['error_c'])) {
        $error_json = base64_decode(urldecode($_GET['error_c']));

        // Convert JSON string back to array
        $error_data = json_decode($error_json, true); // true to get associative array

        // Extract individual elements
        $id = $error_data['id'];
        $message = $error_data['message'];
        $topic = $error_data['topic'];
        $type = $error_data['type'];

        // Properly escape and quote the string values for JavaScript
        $js_message = json_encode($message);
        $js_topic = json_encode($topic);
        $js_type = json_encode($type);

        // Output the JavaScript function call

        echo '<script> error_by_code(' . $id . ', ' . $js_message . ', ' . $js_topic . ', ' . $type . '); </script>';
    }


    if (isset($_GET['info'])) {

        $info = base64_decode($_GET['info']);

        echo '<script>  update_message("' . $info . '");</script>';
    }
    ?>


    <div class="wrapper">

