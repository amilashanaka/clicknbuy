<?php

class TodoCategoryController extends TableController
{

    private $conn;
    private $table;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
        $this->table = "todo_categories";

        parent::__construct( $database, $this->table);
    }

    public function get_name_by_id($id): string
    {

        $query = "SELECT f2 FROM $this->table where id={$id}";
        $smt = $this->conn->query($query);
        
        $name = $smt->fetch(PDO::FETCH_ASSOC);

       if($name){

        return $name['f2'];

       }else{
        return "";
       }
      
    }






}
