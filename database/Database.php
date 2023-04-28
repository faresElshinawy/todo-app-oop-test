<?php

class Database{

    public $conn;

    // database connect function
    public function __construct(){
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "todo";
        $this->conn = mysqli_connect($hostname,$username,$password,$dbname);
        if(!$this->conn){
            die("Error :" . mysqli_connect_error());
        }else{
            return $this->conn;
        }
    }


    // database insert function
    public function Insert($sql){
        if(mysqli_query($this->conn,$sql)){
            return "your insert is done successfully";
        }else{
            return false;
        }
    }

    // database update function
    public function Update($sql){
        if(mysqli_query($this->conn,$sql)){
            return "your update is done successfully";
        }else{
            return false;
        }
    }

    // get all tasks record with id
    public function Gettasks($id){
        $sql = "SELECT tasks.Id , Description , taskstatus.Name , Created_at , Done_at  FROM tasks INNER JOIN taskstatus ON taskstatus.Id = tasks.status_id AND User_id = '$id'";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
        return false;
    }

        // delete record from table
        public function DeleteRecord($table,$id){
            $sql = "DELETE FROM $table WHERE Id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            return "data removed successfully";
        }

        // delete record from table
        public function UpdateRecord($table,$id){
            $sql = "UPDATE $table SET status_id = '1' WHERE Id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            return "one more task is done keep up the great work";
        }

        // get  record with id
        public function Gettask($table,$id){
            $sql = "SELECT * FROM tasks WHERE Id = '$id'";
            $result = mysqli_query($this->conn,$sql);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            return false;
        }








}