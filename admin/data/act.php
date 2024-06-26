<?php

include_once '../../conn.php';
include_once '../../inc/functions.php';

//featch Data

$id = $_POST['id'];
$table_name = $_POST['tbl'];
 


if ($table_name == 'a') {
    $sql = "UPDATE admins SET a_status = '1' WHERE a_id = '" . $id . "'";
} elseif ($table_name == 'cu') {
    $sql = "UPDATE currency SET cu_status = '1' WHERE cu_id = '" . $id . "'";
} elseif ($table_name == 'u') {
    $sql = "UPDATE users SET u_status = '1' WHERE u_id = '" . $id . "'";
} elseif ($table_name == 'v') {
    $sql = "UPDATE vehicles SET v_status = 1 WHERE  v_id = '" . $id . "'";
}




if (mysqli_query($conn, $sql)) {
    if ($table_name == 'a') {
        echo json_encode(array('res' => 1));
    } else if ($table_name == 'cu') {
        echo json_encode(array('res' => 3));
    } else if ($table_name == 'u') {
        echo json_encode(array('res' => 5));
    } else if ($table_name == 'v') {
        echo json_encode(array('res' => 7));
    } 
} else {
    if ($table_name == 'a') {
        echo json_encode(array('res' => 2));
    } else if ($table_name == 'cu') {
        echo json_encode(array('res' => 4));
    } else if ($table_name == 'u') {
        echo json_encode(array('res' => 6));
    } else if ($table_name == 'v') {
        echo json_encode(array('res' => 8));
    } 
}

 