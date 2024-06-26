<?php



include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';
include_once '../session.php';


// Define the keys you want to process
$wanted_keys = ['id', 'user', 'f1', 'f2', 'f3', 'f4', 'created_by', 'updated_by', 'created_date', 'updated_date'];

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$data['id'] = $id;

$user = isset($_POST['user']) ? (int)$_POST['user'] : 0;
$data['user'] = $user;


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


// File location 
$target_dir = "../../uploads/user/doc/". $user."/";
$targ_front="../uploads/user/doc/". $user."/";
$file = uploaFile("f2", $target_dir);




if($file!=''){

    $f2=$targ_front.$file;    
    $data['f2'] =  $f2;
    $data['f3'] = 'file';
}else{
    $f2='';
}



if ($id > 0) { //save   

    $data['updated_by'] = $_SESSION['login'];
    $data['updated_date'] = date("Y-m-d H:i:s");
    $result = $doc->update($data);

    if( $result['error']==null && $result['status']==1){
        $info=$result['message']; 
       
        $info = implode(" ", $info);
        header('Location: ../document_list.php?error=' . base64_encode(1) . '&info=' . base64_encode($info));
    }else{
        header('Location: ../document?id=' . base64_encode($id) . '&error=' . base64_encode(3));
    }
  
 
} else {
  
    $data['created_by'] = $_SESSION['login'];
    $data['created_date'] = date("Y-m-d H:i:s"); 
    $result = $doc->register($data);  
    if($result['code']==200)
    {
        header('Location: ../document_list'. '?error=' . base64_encode(4));
    }else
    {
        header('Location: ../document?id=' . base64_encode($id) . '&error=' . base64_encode(3));
    }


}














/*
 //Fetching Values from URL
 if (isset($_POST['id'])) { $id= $_POST['id'];}else{ $id= 0;}

 if (isset($_POST['f1'])) { $f1= $_POST['f1'];}else{ $f1= '';}


 if (isset($_POST['user'])) { $user= $_POST['user'];}else{ $user= 0;}
 // action 
$action = $_POST['action'];

 
// File location 
$target_dir = "../../uploads/user/doc/". $user."/";
$targ_front="../uploads/user/doc/". $user."/";
$file = uploaFile("f2", $target_dir);
 


if($file!=''){

    $f2=$targ_front.$file;
}else{
    $f2='';
}
 


 

if ($action == 'register') {

    $result=$doc->register($user,$f1,$f2);

    if($result['code']==200)
    {
        header('Location: ../document_list'. '?error=' . base64_encode(4));
    }else
    {
        header('Location: ../document?id=' . base64_encode($id) . '&error=' . base64_encode(3));
    }
 
}


if ($action == 'update' && $id > 0) {


    $data= ['id' => $id];

    if($f1 != '') { ($data['f1']=$f1); }
    if($f4 != '') { ($data['f4']=$f4); }
    if($f5 != '') { ($data['f5']=$f5); }
    if($f6 != '') { ($data['f6']=$f6); }
    if($f7 != '') { ($data['f7']=$f7); }
    if($f8 != '') { ($data['f8']=$f8); }
    if($f9 != '') { ($data['f9']=$f9); }

    if($f10 != '') { ($data['f10']=$f10); }
    if($f11 != '') { ($data['f11']=$f11); }



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

}*/
