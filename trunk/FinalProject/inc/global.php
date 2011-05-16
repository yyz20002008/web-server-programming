<?php
require_once( 'passwords.php');
function getConnection()
{
        global $dbPassword;
        $db = new mysqli('', 'N02202273', $dbPassword, 'N02202273_db' );
        if(!empty($conn->connect_error)) throw new Exception( $conn->connect_error );
        return $db;
}
function EscapeRS($conn, $rs)
{
        $cleanRs = array();
        foreach($rs as $key => $value)
        {
                $cleanRs[$key] = $conn->real_escape_string($value);
        }
        return $cleanRs;
}
