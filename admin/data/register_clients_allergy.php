<?php
include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';
// Define the keys you want to process

$wanted_keys = ['id', 'user', 'allergy', 'created_by', 'updated_by', 'created_date', 'updated_date'];
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






if ($id <= 0) {
    $result = $client_allergies->register($data);


    if ($result['code'] == 200) {
        header('Location: ../client_allergies_list' . '?error=' . base64_encode(4));
    } else {
        header('Location: ../client_allergies_list?error=' . base64_encode(3));
    }
} else {
    $result = $client_allergies->update($data);
    if ($result['error'] == null) {
        if ($result['status'] == 1) {
            $info = $result['message'];
            $info = implode(" ", $info);
            header('Location: ../allergies_list?error=' . base64_encode(1) . '&info=' . base64_encode($info));
        } else {
            header('Location: ../allergy?id=' . base64_encode($id) . '&error=' . base64_encode(2) . '&info=' . base64_encode($info));
        }
    } else {
        header('Location: ../allergy?id=' . base64_encode($id) . '&error=' . base64_encode(1));
    }
}
