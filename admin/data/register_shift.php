<?php
include_once '../session.php';
include_once __DIR__ . '/../controllers/index.php';
include_once '../../inc/functions.php';



if (isset($_POST['action'])) {
    if ($_POST['action'] == 'get_all') {
        $data = $shift_admin->get_all();



        $events_all = [];

        // Iterate through each event in $data['data']
        foreach ($data['data'] as $event) {
            $start = date('Y-m-d\TH:i:s', strtotime($event['f2'])); // Assuming 'f2' is the start time
            $end = $event['f3'] ? date('Y-m-d\TH:i:s', strtotime($event['f3'])) : null; // End time, if available

            $admin_name = $admin->getAdminById($event['admins'])['admin']['f6'];

            $calendar_event = [
                'id' => $event['id'],
                'title' => $admin_name . ' (' . $event['f1'] . ')',
                'start' => $start, // Start time
                'end' => $end, // End time (optional)
                'allDay' => (bool) $event['f4'], // Convert to boolean
                'description' => $event['f5'], // Description or additional data
                'created_by' => $event['created_by'],
                'updated_by' => $event['updated_by'],
                'created_date' => $event['created_date'],
                'updated_date' => $event['updated_date'],
                'status' => $event['status'],
                'admins' => $event['admins'],
                'shift_plans' => $event['shift_plans']
            ];

            // Add the event to the $events_all array
            $events_all[] = $calendar_event;
        }


        /*


        $events_all = [
            [
                'id' => 1,
                'title' => 'All Day Event',
                'start' => '2024-06-22',
                'backgroundColor' => '#f56954', // red
                'borderColor' => '#f56954', // red
                'allDay' => true
            ],
            [
                'id' => 2,
                'title' => 'Long Event',
                'start' => '2024-06-16',
                'end' => '2024-06-19',
                'backgroundColor' => '#f39c12', // yellow
                'borderColor' => '#f39c12' // yellow
            ],
            [
                'id' => 3,
                'title' => 'Meeting',
                'start' => '2024-06-21T10:30:00',
                'backgroundColor' => '#0073b7', // Blue
                'borderColor' => '#0073b7' // Blue
            ],
            [
                'id' => 4,
                'title' => 'Lunch',
                'start' => '2024-06-21T12:00:00',
                'end' => '2024-06-21T14:00:00',
                'backgroundColor' => '#00c0ef', // Info (aqua)
                'borderColor' => '#00c0ef', // Info (aqua)
                'admins' => array(33, 35, 37),
            ],
            [
                'id' => 5,
                'title' => 'Birthday Party',
                'start' => '2024-06-22T19:00:00',
                'end' => '2024-06-22T22:30:00',
                'backgroundColor' => '#00a65a', // Success (green)
                'borderColor' => '#00a65a', // Success (green)
                'admins' => array(33, 35, 37),
            ],
            [
                'id' => 6,
                'title' => 'Meeting',
                'start' => '2024-06-22T19:00:00',
                'end' => '2024-06-22T22:30:00',
                'backgroundColor' => '#00c0ef', // Success (green)
                'borderColor' => '#00a65a', // Success (green)
                'admins' => array(33, 35, 37),
            ],
            [
                'id' => 7,
                'title' => 'Click for Google',
                'start' => '2024-06-28',
                'end' => '2024-06-29',
                'url' => 'https://www.google.com/',
                'backgroundColor' => '#3c8dbc', // Primary (light-blue)
                'borderColor' => '#3c8dbc' // Primary (light-blue)
            ]
        ];*/
        header('Content-Type: application/json');
        echo json_encode($events_all);
        exit;
    } elseif ($_POST['action'] == 'get_event') {
        if (isset($_POST['id'])) {

            $eventId = $_POST['id'];

            $event = $shift_admin->get_by_id($eventId)['data'];

            $start = date('Y-m-d\TH:i:s', strtotime($event['f2'])); // Assuming 'f2' is the start time
            $end = $event['f3'] ? date('Y-m-d\TH:i:s', strtotime($event['f3'])) : null; // End time, if available

            //$admin_name=$admin->getAdminById($event['admins'])['admin']['f6'];

            $calendar_event = [
                'id' => $event['id'],
                'title' => $event['f1'], // Title
                'start' => $start, // Start time
                'end' => $end, // End time (optional)
                'allDay' => (bool) $event['f4'], // Convert to boolean
                'description' => $event['f5'], // Description or additional data
                'created_by' => $event['created_by'],
                'updated_by' => $event['updated_by'],
                'created_date' => $event['created_date'],
                'updated_date' => $event['updated_date'],
                'status' => $event['status'],
                'admins' => array($event['admins']),
                'shift_plans' => $event['shift_plans']
            ];



            /*
            $events = [
                'id' => 4,
                'title' => 'Lunch',
                'start' => '2024-06-21T12:00:00',
                'end' => '2024-06-21T14:00:00',
                'backgroundColor' => '#00c0ef', // Info (aqua)
                'borderColor' => '#00c0ef', // Info (aqua)
                'admins' => array(33, 35, 37),
            ];*/
        } else {

            $calendar_event = [];
        }
        header('Content-Type: application/json');
        echo json_encode($calendar_event);
        exit;
    } elseif ($_POST['action'] == 'add_event') {


        // Define the keys you want to process
        $wanted_keys = ['id', 'f1', 'f2', 'f3', 'f4', 'f5', 'admins', 'created_by', 'updated_by', 'created_date', 'updated_date'];
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $data['id'] = $id;

        $shift_plans = isset($_POST['shift_plans']) ? (int)$_POST['shift_plans'] : 0;

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
        $admin_list = $data['admins'];


        $participants = array();
        unset($data['admins']);




        if ($shift_plans > 0) { //update  


            $data['id'] = $shift_plans;
            $data['updated_by'] = $_SESSION['login'];
            $data['updated_date'] = date("Y-m-d H:i:s");

            $result = $shift->update($data);

            

            foreach ($admin_list as $a_id) {
                $wr = [
                    'shift_plans' => $shift_plans,
                    'admins' => $a_id
                ];


                $row = $shift_admin->get_data($wr);


                if ($row['error'] == null) {
                    // found record related to shift      

                    $participant = $data;
                    $participant['id'] = $row['data'][0]['id'];

                    $result2 = $shift_admin->update($participant);
                } else {

                    // new admin to available shift
                    $participant = $data;
                    $participant['id'] = 0;
                    $participant['shift_plans'] = $shift_plans;
                    $participant['admins'] = $a_id;



                    $result2 = $shift_admin->register($participant);
                }


                $participant['shift_plans'] = $id;
                $participant['admins'] = $a_id;

                $result2 = $shift_admin->register($participant);
            }

            if ($result['status'] == 1) {
                $info = $result['message'];


                $info = implode(" ", $info);
                header('Location: ../shift_plan.php?error=' . base64_encode(1) . '&info=' . base64_encode($info));
            } else {
                header('Location: ../shift_plan.php?error=' . base64_encode(2) . '&info=' . base64_encode($info));
            }






            //$result['inserted_id'] = base64_encode($id);
        } else {

            $data['created_by'] = $_SESSION['login'];
            $data['created_date'] = date("Y-m-d H:i:s");
            $result = $shift->register($data);

            $participant = $data;

            $id = $result['inserted_id'];

            foreach ($admin_list as $a_id) {
                $participant['shift_plans'] = $id;
                $participant['admins'] = $a_id;

                $result2 = $shift_admin->register($participant);
            }


            if ($result['code'] == 200) {
                header('Location: ../shift_plan' . '?error=' . base64_encode(4));
            } else {
                header('Location: ../shift_plan?error=' . base64_encode(3));
            }
        }

        // end save/update

    }
} else {
    $events = [];
    echo json_encode($events);
    exit;
}
