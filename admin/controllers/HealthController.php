<?php

class HealthController extends TableController
{

    private $conn;
    private $table;
    private $foreign_key;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "health";
        $this->foreign_key = "user";

        parent::__construct( $database, $this->table);
    }

    public function get_by_user($user): array
    {
        return $this->get_by_Foreign_key($user);    

    }

    public function get_Doc_by_user($user): array
    {
        return $this->get_by_Foreign_key($user);    

    }




}