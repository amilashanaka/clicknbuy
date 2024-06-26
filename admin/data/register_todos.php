<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once '../session.php';
include_once   './../controllers/index.php';
include_once '../../inc/functions.php';




// Define the keys you want to process
$wanted_keys = ['id', 'f1', 'todo_categories',  'todo_items', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'created_by', 'updated_by', 'created_date', 'updated_date'];
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$data['id'] = $id;

// Loop through each wanted key
foreach ($wanted_keys as $key) {
    if (isset($_POST[$key]) && !empty($_POST[$key])) {
        $data[$key] = $_POST[$key];
    }
}

if (isset($data['f4'])) {
    $data['f4'] = 1; //Recurring
} else {
    $data['f4'] = 0;
}

if (isset($data['f6'])) {
    $data['f6'] = 1; //Clients   

} else {
    $data['f6'] = 0; //Carers
}

 

// Determine if clients or carers
$is_client = ($data['f6'] == 1);
$participants = array();
$related_admins=array(); // for create todo task for Carers
$notification_admins=array(); // for notification for Carers

foreach ($data['f7'] as $participant_id) {
    if ($is_client) {
        // Clients
        $participants[] = [
            'todos' => $id,
            'admins' => 0,
            'users' => $participant_id
        ];

        $admins_of_clients = $my_clients->get_admins_id_by_client($participant_id);
        if (!empty($admins_of_clients['data'])) {
            foreach ($admins_of_clients['data'] as $admin_data) {
                $admin_id = $admin_data['admin'];
                $related_admins[] = [
                    'todos' => $id,
                    'admins' => $admin_id,
                    'users' => $participant_id
                ];
                $unique_admins[$admin_id] = true;
            }
        }
    } else {
        // Carers
        $participants[] = [
            'todos' => $id,
            'admins' => $participant_id,
            'users' => 0
        ];

        $related_admins[] = [
            'todos' => $id,
            'admins' => $participant_id,
            'users' => 0
        ];
        $unique_admins[$participant_id] = true;
    }
}




// Create $notification_admins array with unique admin IDs
$notification_admins = array_map(function($admin) use ($id) {
    return [       
        'admins' => $admin
    ];
}, array_keys($unique_admins));



if ($id == 0) {
    $data['created_by'] = $_SESSION['login'];
    $data['created_date'] = date("Y-m-d H:i:s");
} else {
    $data['updated_by'] = $_SESSION['login'];
    $data['updated_date'] = date("Y-m-d H:i:s");
}


$data['f7']='';

if ($id == 0) { //insert
    $result = $todo->register($data); // todo headers 
    if ($result['error'] == null && $result['status'] > 0) {
        $id = $result['inserted_id'];

        foreach ($participants as $participant) { // for save todo parameters only for displaying in update todos
            $participant['todos'] = $id;
            $participant['created_by'] = $_SESSION['login'];
            $participant['created_date'] = date("Y-m-d H:i:s");
            $result3 = $todo_participants->register($participant);
        }

       
        foreach ($notification_admins as $carer) { // notification for caree
            $carer['f1'] = 'todos';
            $carer['f2'] = $id;
            $carer['f3'] = 'To-Dos';   
            $carer['f4'] =  $data['f1'];
            $carer['f5'] = $data['f8'];       
            $carer['created_by'] = $_SESSION['login'];
            $carer['created_date'] = date("Y-m-d H:i:s");          
            $result3 = $notification->register($carer);
          
        }

        // todo_tasks for tracking the carer events
       
        foreach ($related_admins as $task) { 
            $task['todos'] = $id;        
            $task['created_by'] = $_SESSION['login'];
            $task['created_date'] = date("Y-m-d H:i:s"); 
           
            $result3 = $todo_tasks->register($task);
            
          
        }

       

        if ($result['code'] == 200) {

            header('Location: ../todo_list?error=' . base64_encode(4));
        } else {    
    
            header('Location: ../todos?error=' . base64_encode(3)).'&id=' . base64_encode($id);
        }

    }else{
        header('Location: ../todos?error=' . $result['error']).'&id=' . base64_encode($id);
    }
    
} else { //update

    $result = $todo->update($data);
    if ($result['error'] == null && $result['status'] > 0) { //if update

        // clear all participant and notifiation
        $todo_conditions = [
            'todos' => $id,
        ];
        $update_data = [
            'status' => 0,
            'updated_date' => date('Y-m-d H:i:s'),
            'updated_by' => $_SESSION['login']
        ];
        $result1 = $todo_participants->update_by_conditions($update_data, $todo_conditions); // deactivate todo_participants



        $todo_notifi_conditions = [
            'f1' => 'todos',
            'f2' =>  $id,
        ];
        foreach ($participants as $participant) { // for save todo parameters only for displaying in update todos
            $participant['todos'] = $id;
            $participant['updated_by'] = $_SESSION['login'];
            $participant['updated_date'] = date("Y-m-d H:i:s");
            $result2 = $todo_participants->register($participant);
        }
       
        $result3 = $notification->delete($todo_notifi_conditions); // delete notifications
        
        // insert new notifications

        foreach ($notification_admins as $carer) {
            $carer['f1'] = 'todos';
            $carer['f2'] = $id;
            $carer['f3'] = 'To-Dos';  
            $carer['f4'] =  $data['f1'];
            $carer['f5'] = $data['f8'];  
            $carer['updated_by'] = $_SESSION['login'];
            $carer['updated_date'] = date("Y-m-d H:i:s");          
            $result4 = $notification->register($carer);
          
        }
     
        $result5 = $todo_tasks->update_by_conditions($update_data, $todo_conditions); // deactivate todo_tasks
    

         // todo_tasks for tracking the carer events
        
         foreach ($related_admins as $task) { 
            $task['todos'] = $id;        
            $task['updated_by'] = $_SESSION['login'];
            $task['updated_date'] = date("Y-m-d H:i:s"); 
           
            $result6 = $todo_tasks->register($task);
          
        }

        $info = $result['message'];
        $info = implode(" ", $info);
        if ($result['code'] == 200) {
            header('Location: ../todo_list?error=' . base64_encode(4).  '&info=' . base64_encode($info));
        } else {   
    
            header('Location: ../todos?error=' . base64_encode(3).'&id=' . base64_encode($id). '&info=' . base64_encode($info));;
        }


    }else{
        header('Location: ../todos?error=' . $result['error']).'&id=' . base64_encode($id);
    }
}

