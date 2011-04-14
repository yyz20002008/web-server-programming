<?
function ListConnectionMethods($person_id)
{
        require_once('../../inc/global.php');
        require_once('../ConnectionMethods/DataAccess.php');
        $result = GetConnectionMethods($person_id);
?>

<table border="1">
                        <tr>
                                <th>Actions</th>
                                <th>Type</th>
                                <th>Value</th>
                        </tr>
        
        <? while($rs = $result->fetch_assoc()){ ?>
                <tr>
                        <td>
                                <a href="../ConnectionMethods/view.php?id=<?=$rs['id']?>">View</a>
                                <a href="../ConnectionMethods/edit.php?id=<?=$rs['id']?>">Edit</a>
                                <a href="../ConnectionMethods/delete.php?id=<?=$rs['id']?>">Delete</a>
                                
                        </td>
                        <td><?=$rs['Category_Name']?></td>
                        <td><?=$rs['Value']?></td>
                </tr>   
        
        <? } ?>
        
</table>

        <a href="../ConnectionMethods/edit.php">Create New Conection Method</a>


<? } ?>
