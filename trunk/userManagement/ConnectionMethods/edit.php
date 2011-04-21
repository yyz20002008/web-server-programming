   <? if(isset($errors)) { ?>
                <ul class="error">
                        <? foreach($errors as $key => $error){ ?>
                                <li><?=$key?>: <?=$error?></li>
                        <? } ?>
                </ul>
        <? } ?>
        
<form method="post" action="controler.php">
<table>
                <tr>
                        <td>
                                <? if(isset($rs['id'])){ ?>
                                        <input type="hidden" name="id" value="<?=$rs['id']?>" />
                                <? } ?>
                                <input type="hidden" name="action" value="save" />
                                <input type="submit" value="Submit" />
                                <a href="./" class="cancel_link">Cancel</a>
                        </td>
                        <td></td>
                        <td>
                                <select name="person_id" id="person_id"
                                                class="<? if(isset($errors['person_id'])){ ?>error<? } ?>"
                                                data-value="<?=$rs['person_id']?>" >
                                                <?
                                                        $result = GetUsers();
                                                        while($userRS = $result->fetch_assoc()){
                                                ?>
                                                        <option value='<?=$userRS['id']?>' >
                                                                <?=$userRS['FirstName']?>
                                                                <?=$userRS['LastName']?>
                                                        </option>
                                                <? } ?>
                                </select>
                                                
                                                
                                                
                                                <? if(isset($errors['person_id'])){ ?>
                                                        <span class="error"><?=$errors['person_id']?></span>
                                                <? } ?>
                        </td>
                        <td>
                                <select         type="text" name="category_id" id="category_id"
                                                class="<? if(isset($errors['category_id'])){ ?>error<? } ?>"
                                                data-value="<?=$rs['category_id']?>" >
                                                <?
                                                        $result = GetCategories();
                                                        while($userRS = $result->fetch_assoc()){
                                                ?>
                                                        <option value='<?=$userRS['id']?>'><?=$userRS['Name']?></option>
                                                <? } ?>
                                </select>
                                                
                                                
                                                
                                                <? if(isset($errors['category_id'])){ ?>
                                                        <span class="error"><?=$errors['category_id']?></span>
                                                <? } ?>
                        </td>
                        <td>
                                <input  type="text" name="Value" id="Value"
                                                class="<? if(isset($errors['Value'])){ ?>error<? } ?>"
                                                value="<?=$rs['Value']?>" />
                                                <? if(isset($errors['Value'])){ ?>
                                                        <span class="error"><?=$errors['Value']?></span>
                                                <? } ?>
                        </td>

        </tr>
        </table>
                                </form>
        
