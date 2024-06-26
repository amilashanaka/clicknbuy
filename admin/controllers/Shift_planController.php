<?php

class Shift_planController extends TableController
{

    private $conn;
    private $table;   


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "shift_plans";       
       

        parent::__construct( $database, $this->table);
    }



    


}