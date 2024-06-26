<?php

class AllergyController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "allergy";

        parent::__construct( $database, $this->table);
    }



}