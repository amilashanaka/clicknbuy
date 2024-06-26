<?php

class ClientAllergiesController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "client_allergies";

        parent::__construct( $database, $this->table);
    }



}