<?php
    //require_once 'config/databases.php';
    require_once 'Encoder.php';
    $token = $_GET['token_verify'];
    //$trans_id = $_GET['q'];
    
    $encod = new Encoder();
    
    //echo $encod->encode("EzaYayang");
    echo $encod->decode($token);
    
    
?>