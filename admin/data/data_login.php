<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../session.php';

include_once  '../controllers/index.php';



$result = $auth->admin_login($_POST['a_username'], $_POST['a_password']);

 



if ($result['error'] == null) {
    $admin = $result['data'];

    $_SESSION['login'] = $admin['id'];
    
  
    $_SESSION['role'] = $admin['f1'];
    if( $admin['f1'] <3)
    {
      $_SESSION['login_name'] = $admin['f6'];

    }else{

      $_SESSION['login_name'] = $admin['f4'];
    }
    header('Location: ../dashboard');
    exit();
} else {
 
     if($result['error'] == 'user not found') {

        header('Location: ../index?error=1');
 
     }elseif($result['error'] == 'wrong password')
     {
        header('Location: ../index?error=1');
     }

    $_SESSION['error'] = $result['error'];
}

