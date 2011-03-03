<?php
require_once( 'passwords.php');
function getConnection()
{
        global $dbPassword;
        $db=new mysqli('', 'N02202273', $dbPassword, 'N02202273_db' );
        if(!empty($conn->connect_error)) throw new Exception( $conn->connect_error);  
        return $db;
}
?>


