<?php
        require_once('../inc/global.php');
        require_once('userData.php');
        $rs = GetUser($_POST['id']);

       
       echo $_POST['id']." ".$_POST['FirstName']." ".$_POST ['LastName']." ".$_POST ['Password']." ".$_POST ['created_at'];
     

      
        $conn = getConnection();
       
        if ($rs['id']!=$_POST['id'])
        {echo "id changed!";
        $conn->query("UPDATE People SET  id=$_POST ['id'] WHERE id=$_POST ['id']");}
       
        else if ($rs['FirstName']!=$_POST['FirstName'])
        {echo "FirstName changed!";
        $conn->query("UPDATE People SET  FirstName=$_POST ['FirstName'] WHERE id=$_POST ['id']");}
       
        else if($rs['LastName']!=$_POST['LastName'])
        $conn->query("UPDATE People SET   LastName=$_POST ['LastName'] WHERE id=$_POST ['id']");
       
        else  if ($rs['Password']!=$_POST['Password'])
        $conn->query("UPDATE People SET   Password=$_POST ['Password'] WHERE id=$_POST ['id']");
       
       
       
       /* $conn->query("UPDATE People SET 
        FirstName='haffwin'  WHERE id=1");*/
       
                   
        /*$conn->query("UPDATE People SET 
        id=$_POST ['id'],
        FirstName=$_POST ['FirstName'],
        LastName'=$_POST ['LastName'],
        Password'=$_POST ['Password'],
      
        WHERE id= $_POST ['id']");
       
         $conn->close();             
         */
        require_once('index.php');
?>