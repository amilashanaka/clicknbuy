<?php
include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';
include_once '../session.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['filepond']) && $_FILES['filepond']['error'] === UPLOAD_ERR_OK) {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $table = isset($_POST['target']) ? $_POST['target'] :'';
        $data['id'] = $id;

        $main_folder='admin';
        if ($table=='users'){
            $main_folder='user';
        }

        $user_id = $id; // Assuming $user is the same as $id. Adjust this if needed.
        $target_dir = "../../uploads/".$main_folder ."/profile/" . $user_id . "/";
        $targ_front = "../uploads/".$main_folder ."/profile/" . $user_id . "/";
        $tmp = uploadPic("filepond", $target_dir);

        if ($tmp != '') {
            $data['img1'] = $targ_front . $tmp;

            $result = $db->update( $table,$data);

            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => 'There was an error moving the uploaded file.');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error in file upload.');
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request method.');
}

echo json_encode($response);
exit;