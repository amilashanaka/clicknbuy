<?php
class AuthController
{

    private $conn;


    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }


    public function admin_login($username,  $password): array
    {
        $result = array();




        $query = "SELECT * FROM admins WHERE f2='$username'";
        $smt = $this->conn->query($query);

        $admin = $smt->fetch(PDO::FETCH_ASSOC);

        if ($admin == false) {

            $query = "SELECT * FROM admins WHERE f4='$username'";
            $smt = $this->conn->query($query);

            $admin = $smt->fetch(PDO::FETCH_ASSOC);

            if ($admin == false) {

                $result['error'] = "user not found";
                $result['code'] = 404;
            } else {

                if ($password == $admin['f5']) {
                    unset($admin['f5']);
                    $result['data'] = $admin;
                    $result['error'] = null;
                    $result['code'] = 200;
                }else {


                    $result['error'] = "wrong password";
                    $result['code'] = 401;
                }
            }
        } else {

            if (password_verify($password, $admin['f3'])) {
                unset($admin['f3']);

                $result['data'] = $admin;
                $result['error'] = null;
                $result['code'] = 200;
            } else {


                $result['error'] = "wrong password";
                $result['code'] = 401;
            }
        }

        return $result;
    }



    public function user_login($data): array
    {


        $result = array();

        return $result;
    }
}
