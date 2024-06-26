<?php

class RiskController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "risk";

        parent::__construct( $database, $this->table);
    }



}