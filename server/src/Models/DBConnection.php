<?php

    namespace Src\Models;
    use mysqli;


    class DBConnection {
        private $host = 'sql204.epizy.com';
        private $username = 'epiz_32132170';
        private  $password = 'A5I1LVTJiMej';
        private $dbname = 'epiz_32132170_DB';
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


   