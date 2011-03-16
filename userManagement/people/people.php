<?
       require_once('../../inc/global.php');
       require_once('userData.php');
       $result = GetUsers();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>People</title>
</head>
<body>
<table border="1">
                         <tr>
                                <th>Actions</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Password</th>
                        </tr>
     
         <? while($rs = $result->fetch_assoc()){ ?>
                <tr>
                        <td>
                                <a href="view.php?id=<?=$rs['id']?>">View</a>
                                <a href="edit.php?id=<?=$rs['id']?>">Edit</a>
                                <a href="delete.php?id=<?=$rs['id']?>">Delete</a>
                               
                        </td>
                        <td><?=$rs['FirstName']?></td>
                        <td><?=$rs['LastName']?></td>
                        <td><?=$rs['Password']?></td>
                </tr>  
       
        <? } ?>
      

        <tr>
        <td><a href="edit.php">Create New User</a></td>
        <td><a href="../index.php">Back</a></td>
        </tr>
</table>
</body>
</html>

