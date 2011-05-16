<tr class="record_row">
                      
                        <td align="center"><?=$rs['pro_name']?></td>
                        <td align="center"><?=$rs['description']?></td>
                        <td align="center">$<?=$rs['price']?></td>
                        <td> <input class="input"name="qty_<?=$rs['pro_id']?>" type="text" value=1></td>
</tr>
<input type="hidden" name="id_<?=$rs['pro_id']?>" value="<?=$rs['pro_id']?>"/> 
               
                 
        