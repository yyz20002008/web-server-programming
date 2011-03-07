<?php
    
    require_once('../inc/global.php');
    $id=$_REQUEST['id'];
    
    $conn=getConnection();
    $conn->query("DELETE FROM WHERE id = $id");
    
    $conn->close();
    
    require_once('index.php');
    
?>
