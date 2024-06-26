<?php

include_once '../session.php';
include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';

// Define the keys you want to process
$wanted_keys = ['id', 'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'users', 'created_by', 'updated_by', 'created_date', 'updated_date'];

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$data['id'] = $id;

// Loop through each wanted key
foreach ($wanted_keys as $key) {
    if (isset($_POST[$key]) && !empty($_POST[$key])) {
        // If 'created_by' or 'updated_by', cast to integer
        if ($key === 'created_by' || $key === 'updated_by') {
            $data[$key] = (int)$_POST[$key];
        } else {
            $data[$key] = $_POST[$key];
        }
    }
}

$clent_list = array();

foreach ($data['users'] as $client_id) {
    $clent_list[] = [
        'users' => $client_id,
    ];
}
unset($data['users']);

if ($id == 0) { //insert


    foreach ($clent_list as $client) {
        $data['users'] =  $client['users'];
        $data['created_by'] = $_SESSION['login'];
        $data['created_date'] = date("Y-m-d H:i:s");
        $result = $med->register($data); // med headers

        if ($result['error'] == null && $result['status'] > 0) {
        } else {
            header('Location: ../med_list' . '?error=' . base64_encode(4));
        }
    }


    header('Location: ../med_list' . '?error=' . base64_encode(4));
} else { //update

    $data['updated_by'] = $_SESSION['login'];
    $data['updated_date'] = date("Y-m-d H:i:s");

    foreach ($clent_list as $client) {
        $data['users'] =  $client['users'];
        $result = $med->update($data);

        if ($result['error'] == null && $result['status'] > 0) {

        } else {
          header('Location: ../med?id=' . base64_encode($id) . '&error=' . base64_encode(1));
        }
    }

    $info = $result['message'];
    $info = implode(" ", $info);
    header('Location: ../med_list?id=' . base64_encode($id) . '&error=' . base64_encode(1) . '&info=' . base64_encode($info));
    
   
}
