<?php 
if ($_REQUEST[username]=="YanzhaoYang"&&$_REQUEST[password]=="666666"){
echo "Success to login in, please click the button below to see your table.";?>
<a href="AdminTable.php">Administrator Table</a></br>
<?
}else echo "Please check your username and password, then try again."
?>
<a href="http://cs.newpaltz.edu/~N02202273/Web/FinalProject/admin.php">Back to Login</a>