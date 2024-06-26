<?php

class MedUserController extends TableController
{

    private $conn;
    private $table;
    private $primary_key;
    private $foreign_key;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "medication_users";
        $this->primary_key = "id";
        $this->foreign_key = "medication";

        parent::__construct( $database, $this->table, $this->primary_key, $this->foreign_key);
    }



}
