<?php
    class database{
        protected $server = "localhost";
        protected $username = "root";
        protected $password = "b6152kuy";
        
        function __construct() {
            $this->serv = $server;
            $this->user = $username;
            $this->pass = $password;
        }
        public function connect($db) {
            $conn = new mysqli($this->serv, $this->user, $this->pass, $db);
            return $conn;
        }
    }
?>
