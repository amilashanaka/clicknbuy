<?php

class AlagiClientController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "client_alagies";

        parent::__construct( $database, $this->table);
    }



}