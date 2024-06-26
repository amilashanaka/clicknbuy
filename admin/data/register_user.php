<?php

 include_once '../session.php';
 include_once __DIR__.'/../controllers/index.php';
 include_once '../../inc/functions.php';


// Define the keys you want to process
$wanted_keys = ['id', 'f1', 'f2', 'f3', 'f4', 'f5','f6','f7', 'f8', 'f9', 'f10', 'f11','f12','f13', 'f14', 'f15', 'f16',  'created_by', 'updated_by', 'created_date', 'updated_date'];



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




// image location 
if (isset($_FILES['user_profile_image']) && $_FILES['user_profile_image']['error'] == 0){
    $target_dir = "../../uploads/user/profile/";
    $img1 = uploadPic("user_profile_image", $target_dir);
    
    if($img1!=null)
    {
    
        $data['img1'] = $img1;
    }
    

}


if ($id == 0) {
    $data['created_by'] = $_SESSION['login'];
    $data['created_date'] = date("Y-m-d H:i:s");
} else {
    $data['updated_by'] = $_SESSION['login'];
    $data['updated_date'] = date("Y-m-d H:i:s");
}

 

if ($id == 0) {

    $result=$user->register($data);

    if($result['code']==200)
    {
        header('Location: ../user_list'. '?error=' . base64_encode(4));
    }else
    {
        header('Location: ../user?id=' . base64_encode($id) . '&error=' . base64_encode(3));
    }
 
}


if ( $id > 0) {

  $result= $user->update($data);

    if( $result['error']==null)
    {
        if($result['status']==1)
        {     
            $info=$result['message'];
   
     
            $info = implode(" ", $info);
            header('Location: ../user.php?id=' . base64_encode($id) . '&error=' . base64_encode(1) . '&info=' . base64_encode($info));
        }else{
            header('Location: ../user.php?id=' . base64_encode($id) . '&error=' . base64_encode(2). '&info=' . base64_encode($info));
        }
    

    }else{

        header('Location: ../user.php?id=' . base64_encode($id) . '&error=' . base64_encode(1));
    }

}

