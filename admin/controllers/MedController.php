<?php

class MedController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "medication";

        parent::__construct($database, $this->table);
    }

    public function get_med_ny_user($user)
    {
        $data = array(
            'users' => $user,
        );

        $result = $this->get_data($data, "created_date");

        return $result;
    }
}
