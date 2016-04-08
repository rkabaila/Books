<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/4/16
 * Time: 1:03 PM
 */

class Database
{
    protected $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "root";
    protected $dbname = "books";

    /**
     * @return PDO
     */
    public function Connect()
    {
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->conn;
    }

    public function Close()
    {
        $this->conn = null;
    }
}
