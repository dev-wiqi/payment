<?php
    class database{
        protected $server = "localhost";
        protected $username = "root";
        protected $password = "b6152kuy";
        
        public function connect($db) {
            $conn = new mysqli($this->server, $this->username, $this->password, $db);
            return $conn;
        }
    }
?>
