<?php

class LogController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "logs";

        parent::__construct( $database, $this->table);
    }



}