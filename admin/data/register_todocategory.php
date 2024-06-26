<?php

include_once '../session.php';
 include_once __DIR__.'/../controllers/index.php';
 include_once '../../inc/functions.php';



// Define the keys you want to process
$wanted_keys = ['id', 'f1', 'f2', 'f3', 'f4', 'f5', 'created_by', 'updated_by', 'created_date', 'updated_date'];

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



$target_dir = "../../uploads/admin/categories/";
$targ_front = "../uploads/admin/categories/";
$tmp = uploadPic("icon_file", $target_dir);


if ($tmp != '') {
    if (array_key_exists('f1', $data)) {      
        $data['f1'] =  $targ_front . $tmp;
    } else {        
        $data['f1'] = $targ_front . $tmp;
    }
    $data['f1'] =  $targ_front . $tmp;
} 


 // action 
$action = $_POST['action'];



if ($action == 'register') {
 

   
    $result=$todo_categories->register($data);

  

    if($result['code']==200)
    {
        header('Location: ../todo_category_list'. '?error=' . base64_encode(4));
    }else
    {
        header('Location: ../todo_category_list?id=' . base64_encode($id) . '&error=' . base64_encode(3));
    }
 
}


if ($action == 'update' && $id > 0) {



    $result= $todo_categories->update($data);

 
        if($result['status']==1)
        {     
            $info=$result['message'];      
   
     
            $info = implode(" ", $info);
            header('Location: ../todo_category_list.php?id=' . base64_encode($id) . '&error=' . base64_encode(1) . '&info=' . base64_encode($info));
        }else{
            header('Location: ../todo_category_list.php?id=' . base64_encode($id) . '&error=' . base64_encode(2). '&info=' . base64_encode($info));
        }
    

    

}

