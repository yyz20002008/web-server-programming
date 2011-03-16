<?
        require_once('../../inc/global.php');
        require_once('userData.php');
        $result = GetUsers();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Address</title>
</head>
<body>
<table border="1">
                        <tr>
                                <th>Actions</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Country</th>
                        </tr>
       
        <? while($rs = $result->fetch_assoc()){ ?>
                <tr>
                        <td>
                                <a href="view.php?id=<?=$rs['id']?>">View</a>
                                <a href="edit.php?id=<?=$rs['id']?>">Edit</a>
                                <a href="delete.php?id=<?=$rs['id']?>">Delete</a>
                               
                        </td>
                        <td><?=$rs['Address']?></td>
                        <td><?=$rs['City']?></td>
                        <td><?=$rs['State']?></td>
                        <td><?=$rs['Zip']?></td>
                        <td><?=$rs['Country']?></td>
                </tr>  
       
        <? } ?>
       
        <tr>
        <td><a href="edit.php">Create New Address</a></td>
        <td><a href="../index.php">Back</a></td>
        </tr>
</table>

</body>
</html>
