<?php

        require_once('../inc/global.php');
              
        $conn = getConnection();
       $conn->query("INSERT INTO People ( FirstName, LastName,Password)
       VALUES ( $_GET[FirstName],$_GET[LastName],$_GET[Password]");
      
      
      
       $conn->close();
       
       require_once('index.php');
?>