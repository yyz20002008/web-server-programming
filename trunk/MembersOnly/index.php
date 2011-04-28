<?php
require_once('authentication.php');

if(IsLoggedIn())
{
        ?> <h1>Welcome <?=GetUserName()?></h1> <?
}else{
        ?>
                <h1>Please Log In</h1> 
                <a href="login.php">Log In</a>
        <?      
}
?>

        <h2>Some stuff that everyone can see</h2>
