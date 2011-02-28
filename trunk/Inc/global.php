<?php
require_once('passwords.php');
function getConnection()
{
    global $dbpassword;
    return new mysql('','yang',$dbpassword,'yang_db');

}