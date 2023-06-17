<?php
session_start();
class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "data";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}

class Register extends Connection
{
    public function Registration($name, $phone, $email, $password)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE name = '$name' AND email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            $query = "INSERT INTO tb_user VALUES('', '$name', '$phone', '$email', '$password')";
            mysqli_query($this->conn, $query);
            return 1;
        }
    }
}
class Login extends connection
{
    public $id;
    public function login($email, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $this->id = $row["id"];
                return 1;
            } else {
                return 10;
            }

        }
    }

    public function idUser()
    {
        return $this->id;
    }
}

class Select extends Connection
{
    public function selectUserById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }
}

?>