<?php

class BenifitController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "benifit";

        parent::__construct( $database, $this->table);
    }



}