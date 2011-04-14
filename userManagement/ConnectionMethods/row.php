 <tr>
                        <td>
                                <a href="view.php?id=<?=$rs['id']?>">View</a>
                                <a data-id="<?=$rs['id']?>" class="edit_link" href="edit.php?id=<?=$rs['id']?>">Edit</a>
                                <a href="delete.php?id=<?=$rs['id']?>">Delete</a>
                                
                        </td>
                        
                        <td><?=$rs['Person_Name']?></td>
                        <td><?=$rs['Category_Name']?></td>
                        <td><?=$rs['Value']?></td>
                </tr>   