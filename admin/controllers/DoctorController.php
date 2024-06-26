<?php

class DoctorController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "doctor";

        parent::__construct( $database, $this->table);
    }



}