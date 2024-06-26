<?php

class ToDoController extends TableController
{

    private $conn;
    private $table;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "todos";

        parent::__construct( $database, $this->table);
    }



    


}
