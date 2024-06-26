<?php

class DocController extends TableController
{

    private $conn;
    private $table;
    private $primary_key;
    private $foreign_key;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "documents";
        $this->primary_key = "id";
        $this->foreign_key = "user";     
       
        parent::__construct( $database, $this->table, $this->primary_key, $this->foreign_key);

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