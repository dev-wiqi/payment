<?php
    class database{
        protected $server = "localhost";
        protected $username = "sammari1_wiqico";
        protected $password = "b6631kkt";
        
        public function connect($db) {
            $conn = new mysqli($this->server, $this->username, $this->password, $db);
            return $conn;
        }
    }
?>
