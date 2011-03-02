<?php
require_once( 'passwords.php');
function getConnection()
{
        global $dbPassword;
        return new mysqli('', 'N02202273', 's051187', 'N02202273_db' );
}
?>