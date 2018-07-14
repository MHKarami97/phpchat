<?php

/*
 * db short summary.
 *
 * db description.
 *
 * @version 1.0
 * @author M-H-KARAMI
 */

class db
{
    private $host= "localhost";
    private $dbname= "messengerdb";
    private $username= "root";
    private $password= "";

    protected $con;

    public function __construct(){

        try{
            $this->con= new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
            $this->con->exec("set names utf8");
        }
        catch(Exception $e){
            echo "error in connect to db".$e->getMessage();
        }
    }
}

?>