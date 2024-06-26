<?php

class MyClientsController
{
    private $conn;
    private $table;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "myclients";
    }


    public function get_clients_by_admin($admin): array
    {
        $result = array();

      
        $query = "SELECT $this->table.id,$this->table.admin,users.f1 as client,  $this->table.created_by, $this->table.created_date , $this->table.status  FROM users LEFT JOIN  $this->table ON users.id =  $this->table.user  where   $this->table.admin =   '$admin'  ";
        $smt = $this->conn->query($query);
        $clients = $smt->fetchAll(PDO::FETCH_ASSOC);

        if ($clients == false) {

            $result['error'] = "no clients found";
        } else {

            $result['clients'] = $clients;
            $result['error'] = null;
        }

        return $result;
    }

    public function get_admins_id_by_client($clients): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );
    
        try {
            $query = "SELECT admin FROM $this->table WHERE user = :client";
    
            // Append ORDER BY clause if $orderBy is provided
            if (!empty($orderBy)) {
                $query .= " ORDER BY $orderBy";
            }
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':client', $clients, PDO::PARAM_INT);
            $stmt->execute();
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }
    
        return $result;
    }


    public function get_client_count_by_admin($admin)
    {

              
        $query = "SELECT COUNT($this->table.id)  as tot  FROM users LEFT JOIN  $this->table ON users.id =  $this->table.user  where   $this->table.admin =   '$admin'  ";
        $smt = $this->conn->query($query);
        $clients = $smt->fetch(PDO::FETCH_ASSOC);
       

        if ($clients == false) {

             return '0';
        } else {

            return $clients['tot'];
        }

      

    }



    public function register($admin, $user, $created_by): array
    {
        $result = array();


        $query = "INSERT INTO $this->table (user, admin, created_by) VALUES ('$user', '$admin',$created_by)";

        if ($this->check_param($user, 'user',$admin,'admin')) {
            $result['error'] = "User already registered";
            $result['code'] = 400;
        } else {
            $smt = $this->conn->query($query);
            if ($smt) {
                $result['message'] = "client added successfully";
                $result['code'] = 200;
            } else {
                $result['error'] = "registration failed";
                $result['code'] = 400;
            }
        }

        return $result;
    }


    public function check_param($f1, $param,$f2,$param2): bool
    {

        $query = "SELECT * FROM $this->table WHERE $param='$f1' and $param2='$f2'";
        $smt = $this->conn->query($query);

        $user = $smt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return false;
        } else {
            return true;
        }
    }

  
    
}
