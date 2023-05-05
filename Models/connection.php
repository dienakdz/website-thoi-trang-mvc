<?php 
    class connection{
        var $conn;
        function __construct()
        {
            //Thong so ket noi CSDL
            $severname ="localhost"; 
            $username ="root";
            $password =""; 
            $db_name ="tvdshop";
 
            //Tao ket noi CSDL
            $this->conn = new mysqli($severname,$username,$password,$db_name);
            $this->conn->set_charset("utf8");

            //check connection
            if ($this->conn->connect_error) {
		        die("Connection failed: " . $this->conn->connect_error);
		    }
        }
        public function select($query){
        $result = $this->link->query($query) or 
        die($this->link->error.__LINE__);
        if($result->num_rows > 0){
        return $result;
        } else {
        return false;
        }
        }
        public function insert($query){
        $insert_row = $this->link->query($query) or 
            die($this->link->error.__LINE__);
        if($insert_row){
            return $insert_row;
        } else {
            return false;
        }
        }

    }
?>