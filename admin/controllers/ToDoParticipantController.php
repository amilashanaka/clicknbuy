
<?php

class ToDoParticipantController extends TableController
{

    private $conn;
    private $table;
    private $primary_key;
    private $foreign_key;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "todo_participants";
        $this->primary_key = "id";
        $this->foreign_key = "todos";

        parent::__construct( $database, $this->table, $this->primary_key, $this->foreign_key);
    }

   
  

}
