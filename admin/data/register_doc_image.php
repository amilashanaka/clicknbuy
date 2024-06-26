<?php

include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';
include_once '../session.php';





$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$user = isset($_POST['user']) ? $_POST['user'] : '';

if (isset($_POST['image'])) {
    $imageData = $_POST['image'];
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $decodedImageData = base64_decode($imageData);

    $img_name = round(microtime(true)) .rand(1000, 9999). '.png';
    $target_dir = "../../uploads/user/doc/" . $user . "/";
    
    // Ensure the directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . $img_name;
    $targ_front = "../uploads/user/doc/" . $user . "/" . $img_name;

    if (file_put_contents($target_file, $decodedImageData)) {
        $save_data = [
            'id' => $id,
            'f2' => $targ_front,
            'f3' => 'image',
            'updated_by' => $_SESSION['login'],
            'updated_date' => date("Y-m-d H:i:s")
        ];

        $result = $doc->update($save_data);


   
        if ($result['error'] == null && $result['status'] > 0) {
           
            //$info = $result['message']; 
            $info = "Image Uploded";
            header('Location: ../document?u_id='.base64_encode($user).'&id='.base64_encode($id).'&error=' . base64_encode(1) . '&info=' . base64_encode($info));
          
        } else {
           
            header('Location: ../document?u_id='.base64_encode($user).'&id='.base64_encode($id).'&error=' . base64_encode(3) . '&info=' . base64_encode($info));
           
        }

       
    } else {
      
        header('Location: ../document?u_id='.base64_encode($user).'&id='.base64_encode($id).'&error=' . base64_encode(3) . '&info=' . base64_encode($info));
    }
} else {
   
    header('Location: ../document?u_id='.base64_encode($user).'&id='.base64_encode($id).'&error=' . base64_encode(3) . '&info=' . base64_encode($info));
}















/*
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if (isset($_POST['image'])) {
    $imageData = $_POST['image'];
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $decodedImageData = base64_decode($imageData);

    $img_name = uniqid() . '.png';

    $target_dir = "../../uploads/user/doc/" . $user . "/" . $img_name;
    $targ_front = "../uploads/user/doc/" . $user . "/" . $img_name;


    $save_data['id'] = $id;
    $save_data['f2'] = $targ_front;
    $save_data['updated_by'] = $_SESSION['login'];
    $save_data['updated_date'] = date("Y-m-d H:i:s");
    $result = $doc->update($save_data);
    dd($result);
}

*/

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['image']) && isset($data['u_id']) && isset($data['id'])) {
        $imageData = $data['image'];


        // Remove the base64 header
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $decodedImageData = base64_decode($imageData);

        $img_name = uniqid() . '.png';

        $target_dir = "../../uploads/user/doc/" . $user . "/" . $img_name;
        $targ_front = "../uploads/user/doc/" . $user . "/" . $img_name;



        if (file_put_contents($target_dir, $decodedImageData)) {

            $save_data['id'] = $data['id'];
            $save_data['user'] = $data['user'];
            $save_data['f2'] = $targ_front;




            if ($id == 0) {
                $save_data['f1'] = 'Untitled Document';
                $save_data['created_by'] = $_SESSION['login'];
                $save_data['created_date'] = date("Y-m-d H:i:s");
                $result = $doc->register($save_data);
                $id = $result['inserted_id'];
            } else {
                $save_data['updated_by'] = $_SESSION['login'];
                $save_data['updated_date'] = date("Y-m-d H:i:s");
                $result = $doc->update($save_data);
            }


            echo json_encode(['success' => true, 'path' => $filePath, 'u_id' => $u_id, 'id' => base64_encode($id)]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing parameters']);
    }
}*/
