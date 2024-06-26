<?php

class Shift_adminsController extends TableController
{

    private $conn;
    private $table;
    private $foreign_key;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "shift_admins";       
        $this->foreign_key = "shift_plans";

        parent::__construct( $database, $this->table, 'id', $this->foreign_key);
    }



    


}