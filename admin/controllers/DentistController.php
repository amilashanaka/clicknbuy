<?php

class DentistController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "dentist";

        parent::__construct( $database, $this->table);
    }



}