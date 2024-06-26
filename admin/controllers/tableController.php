<?php

class TableController
{
   
    private $conn;
    private $table;
    private $primary_key;
    private $foreign_key;

    public function __construct(Database $database, $table, $primary_key = 'id', $foreign_key = '')
    {
        $this->conn = $database->getConnection();
        $this->table = $table;
        $this->primary_key = $primary_key;
        $this->foreign_key = $foreign_key;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function get_by_id($id, $orderBy = ''): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );
    
        try {
            $query = "SELECT * FROM $this->table WHERE $this->primary_key = :id";
    
            // Append ORDER BY clause if $orderBy is provided
            if (!empty($orderBy)) {
                $query .= " ORDER BY $orderBy";
            }
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }
    
        return $result;
    }
    public function get_by_Foreign_key($id,$orderBy = ''): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );
    
        try {
            $query = "SELECT * FROM $this->table WHERE $this->foreign_key = :id";
    
  
            // Append ORDER BY clause if $orderBy is provided
            if (!empty($orderBy)) {
                $query .= " ORDER BY $orderBy";
            }
            
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }
    
        
        return $result;
    }

    public function get_all(): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );


        try {
            $query = "SELECT * FROM $this->table";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }

        return $result;
    }



    public function get_data($params = array(), $orderBy = ''): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );

        try {
            // Construct the query
            $query = "SELECT * FROM $this->table WHERE ";

            // Construct the WHERE clause from the params array
            $conditions = [];
            foreach ($params as $field => $value) {
                $conditions[] = "$field = :$field";
            }
            $query .= implode(" AND ", $conditions);

            // Append ORDER BY clause if $orderBy is provided
            if (!empty($orderBy)) {
                $query .= " ORDER BY $orderBy";
            }

            
            // Prepare the statement
            $stmt = $this->conn->prepare($query);

            // Bind parameters
            foreach ($params as $field => &$value) {
                $stmt->bindParam(":$field", $value);
            }

            // Execute the statement
            $stmt->execute();

            // Fetch the data
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Process the result
            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }

        return $result;
    }

    public function get_data_sql($query, $params = array()): array
    {
        $result = array(
            'data' => [],
            'error' => null,
        );

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($data) {
                $result['data'] = $data;
                $result['error'] = null;
            } else {
                $result['error'] = "No data found";
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
        }

        return $result;
    }
    public function register($data): array
    {
        $result = array();
        $fields = '';
        $placeholders = '';
        $params = array();



        foreach ($data as $field => $value) {
            $fields .= "$field, ";
            $placeholders .= ":$field, ";
            $params[$field] = $value;
        }

        $fields = rtrim($fields, ', ');
        $placeholders = rtrim($placeholders, ', ');

        try {

            $query = "INSERT INTO $this->table ($fields) VALUES ($placeholders)";
            $stmt = $this->conn->prepare($query);


            if ($stmt->execute($params)) {
                $result['status'] = $stmt->rowCount();
                $result['inserted_id'] = $this->conn->lastInsertId($this->primary_key);
                $result['message'] = "Record successfully inserted";
                $result['code'] = 200;
                $result['error'] = null;
            } else {
                $result['error'] = "Insert failed";
                $result['code'] = 200;
            }
        } catch (PDOException $e) {
            $result['error'] = $e->getMessage();
            $result['code'] = 400;
        }

        return $result;
    }

    public function update($data): array
    {
        $result = array();
        $out = array();


        $id = $data['id'] ?? 0;

        if ($id > 0) {
            $result = $this->get_by_id($id);

            if ($result['error'] == null) {
                $update_fields = '';
                $params = [];

                foreach ($data as $field => $value) {
                    if (array_key_exists($field, $result['data'])) {
                        if ($result['data'][$field] != $value) {
                            $update_fields .= "$field = :$field, ";
                            $params[$field] = $value;
                            $msg = "successfully updated";
                        } else {
                            $msg = "not change";
                        }
                        $out[$field] = $msg;
                    } else {
                        $out[$field] = "incorrect input";
                        $result['error'] = "incorrect input";
                    }
                }

                $update_fields = rtrim($update_fields, ', ');

                if (!empty($update_fields)) {
                    try {
                        $query = "UPDATE $this->table SET $update_fields WHERE $this->primary_key = :id";
                        $params['id'] = $id;

                        $stmt = $this->conn->prepare($query);

                        if ($stmt->execute($params)) {
                            $result['status'] = $stmt->rowCount();
                            $result['error'] = null;
                        } else {
                            $result['error'] = "Update failed";
                        }
                    } catch (PDOException $e) {
                        $result['error'] = $e->getMessage();
                        $result['status']=0;
                    }
                }

                $result['message'] = $out;
            }
        }

        return $result;
    }

    public function update_by_conditions($data, $conditions = []): array
    {
        $result = array();
        $out = array();
    
        if (!empty($data) && !empty($conditions)) {
            $update_fields = '';
            $where_clause = '';
            $params = [];
    
            // Prepare the fields for update
            foreach ($data as $field => $value) {
                $update_fields .= "$field = :$field, ";
                $params[$field] = $value;
                $out[$field] = "prepared for update";
            }
    
            // Remove trailing comma from update fields
            $update_fields = rtrim($update_fields, ', ');
    
            // Construct the WHERE clause from conditions
            foreach ($conditions as $field => $value) {
                $where_clause .= "$field = :cond_$field AND ";
                $params["cond_$field"] = $value;
            }
    
            // Remove trailing ' AND ' from where clause
            $where_clause = rtrim($where_clause, ' AND ');
    
            if (!empty($update_fields) && !empty($where_clause)) {
                try {
                    $query = "UPDATE $this->table SET $update_fields WHERE $where_clause";
                    $stmt = $this->conn->prepare($query);
    
                    if ($stmt->execute($params)) {
                        $result['status'] = $stmt->rowCount();
                        $result['message'] = "Update successful";
                        $result['error'] = null;
                    } else {
                        $result['error'] = "Update failed";
                    }
                } catch (PDOException $e) {
                    $result['error'] = $e->getMessage();
                    $result['status'] = 0;
                }
            } else {
                $result['error'] = "Invalid update fields or conditions";
            }
        } else {
            $result['error'] = "No data or conditions provided";
        }
    
        $result['message'] = $out;
        return $result;
    }
    public function delete_by_id($id): array
    {
        $result = array();

        // Check if id is valid
        if ($id > 0) {
            try {
                // Prepare the SQL statement
                $query = "DELETE FROM $this->table WHERE $this->primary_key = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // Execute the statement
                if ($stmt->execute()) {
                    $result['status'] = $stmt->rowCount();
                    $result['message'] = "Record successfully deleted";
                    $result['error'] = null;
                } else {
                    $result['error'] = "Delete failed";
                }
            } catch (PDOException $e) {
                $result['error'] = $e->getMessage();
            }
        } else {
            $result['error'] = "Invalid ID";
        }

        return $result;
    }

    public function delete($conditions): array
    {
        $result = array();

        // Check if conditions array is not empty
        if (!empty($conditions)) {
            try {
                // Build the WHERE clause
                $where_clause = '';
                $params = [];
                foreach ($conditions as $field => $value) {
                    $where_clause .= "$field = :$field AND ";
                    $params[$field] = $value;
                }
                $where_clause = rtrim($where_clause, ' AND ');

                // Prepare the SQL statement
                $query = "DELETE FROM $this->table WHERE $where_clause";
                $stmt = $this->conn->prepare($query);

                // Bind the parameters
                foreach ($params as $field => $value) {
                    $stmt->bindValue(":$field", $value);
                }

                // Execute the statement
                if ($stmt->execute()) {
                    $result['status'] = $stmt->rowCount();
                    $result['message'] = "Record(s) successfully deleted";
                    $result['error'] = null;
                } else {
                    $result['error'] = "Delete failed";
                }
            } catch (PDOException $e) {
                $result['error'] = $e->getMessage();
                $result['status']=0;
            }
        } else {
            $result['error'] = "No conditions provided";
            $result['status']=0;
        }

        return $result;
    }
}
