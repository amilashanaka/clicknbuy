<?php



include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';
include_once '../session.php';


// Define the keys you want to process
$wanted_keys = ['id', 'user', 'f1', 'f2', 'f3', 'f4', 'created_by', 'updated_by', 'created_date', 'updated_date'];

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


if (isset($data['f1'])) {
    if ($data['f1'] == '') {
        $data['f1'] = 'Untitled Document';
    }
} else {
    $data['f1'] = 'Untitled Document';
}



if ($id > 0) { //save   

    $data['updated_by'] = $_SESSION['login'];
    $data['updated_date'] = date("Y-m-d H:i:s");
    $result = $doc->update($data);
    $result['inserted_id']=base64_encode($id);
 
} else {
  
    $data['created_by'] = $_SESSION['login'];
    $data['created_date'] = date("Y-m-d H:i:s"); 
    $result = $doc->register($data);  
    $result['inserted_id']=base64_encode($result['inserted_id']);
    //$id = $result['inserted_id'];
}

echo json_encode($result);
