<?php

class NotificationController extends TableController
{

    private $conn;
    private $table;
    private $primary_key;
    private $foreign_key;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "notifications";
          

        parent::__construct( $database, $this->table);
    }

    public function get_all_notifications($admin_id){
        $result = array(
            'data' => [],
            'error' => null,
        );
    
        try {
            // Prepare the SQL query
            $query = "SELECT * FROM $this->table WHERE admins = :admin_id ORDER BY f1 ASC, created_date DESC";
    
            // Prepare the statement
            $stmt = $this->conn->prepare($query);
            // Bind the parameter
            $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
            // Execute the statement
            $stmt->execute();
    
            // Fetch the data
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Check if data was found
            if ($data) {
                $result['data'] = $data;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }
    
        return $result;
    }

    function groupByField($data, $field)
{
    $groupedData = array();

    foreach ($data as $item) {
        if (isset($item[$field])) {
            $key = $item[$field];
            if (!isset($groupedData[$key])) {
                $groupedData[$key] = array();
            }
            $groupedData[$key][] = $item;
        }
    }

    return $groupedData;
}


   
    public function get_notifications($admin_id){
        
       $result= $this-> get_all_notifications($admin_id);
      
        $groupedData = $this-> groupByField($result['data'], 'f3');
        $response['count']=count($result['data']);
        $response['data']= $groupedData; 

         // Calculate time differences for each notification
    foreach ($response['data'] as &$notifications) {
        foreach ($notifications as &$notification) {
            $createdDate = strtotime($notification['created_date']);
            $timeDiff = time() - $createdDate;
            
            // Calculate time ago in human-readable format
            if ($timeDiff < 60) {
                $notification['time_ago'] = 'just now';
            } elseif ($timeDiff < 3600) {
                $notification['time_ago'] = floor($timeDiff / 60) . ' minutes ago';
            } elseif ($timeDiff < 86400) {
                $notification['time_ago'] = floor($timeDiff / 3600) . ' hours ago';
            } else {
                $notification['time_ago'] = floor($timeDiff / 86400) . ' days ago';
            }
        }
    }

       
       return $response;
    }

}
