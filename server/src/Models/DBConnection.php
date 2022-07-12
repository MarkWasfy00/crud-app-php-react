<?php

    namespace Src\Models;
    use mysqli;


    class DBConnection {
        private $host = '**';
        private $username = '**';
        private  $password = '**';
        private $dbname = '**';
        protected $connection;



        protected function connect()
        {
            $this->connection = new mysqli($this -> host, $this -> username, $this -> password , $this -> dbname);
            if (!$this -> connection) {
                echo "conection failed: " . mysqli_connect_error();
            }
        }

        protected function disconnect()
        {
            if ($this->connection) {
                mysqli_close($this -> connection);
            }
        }
    }


   
