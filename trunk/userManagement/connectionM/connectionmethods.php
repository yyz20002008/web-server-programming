<?
        require_once('../../inc/global.php');
        require_once('userData.php');
        $result = GetUsers();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ConnectionMethods</title>
</head>
<body>
<table border="1">
                        <tr>
                                <th>Actions</th>
                                <th>Person_id</th>
                                <th>Category_id</th>
                                <th>Value</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                
                        </tr>
       
        <? while($rs = $result->fetch_assoc()){ ?>
                <tr>
                        <td>
                                <a href="view.php?id=<?=$rs['id']?>">View</a>
                                <a href="edit.php?id=<?=$rs['id']?>">Edit</a>
                                <a href="delete.php?id=<?=$rs['id']?>">Delete</a>
                               
                        </td>
                        <td><?=$rs['person_id']?></td>
                        <td><?=$rs['category_id']?></td>
                        <td><?=$rs['Value']?></td>
                        <td><?=$rs['created_at']?></td>
                        <td><?=$rs['updated_at']?></td>
                </tr>  
       
        <? } ?>
       

        <tr>
        <td><a href="edit.php">Create New Value</a></td>
        <td><a href="../index.php">Back</a></td>
        </tr>
</table>
</body>
</html>