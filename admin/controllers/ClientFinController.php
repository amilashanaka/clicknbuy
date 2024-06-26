<?php

class ClientFinController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "client_fin";

        parent::__construct( $database, $this->table);
    }



}