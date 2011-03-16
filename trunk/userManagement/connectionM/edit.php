<?
        require_once('../../inc/global.php');
        require_once('userData.php');
        if(isset($_REQUEST['Submit']))
        {
                $rs = $_REQUEST;
                if(!$errors = ValidateUser($rs))
                        if(isset($_REQUEST['id']))
                        {
                                if(!$errors = SaveUser($rs))
                                        header("location: connectionmethods.php");
                        }else{
                                if(!$errors = CreateUser($rs))
                                        header("location: connectionmethods.php");
                        }
        }else{
                if(isset($_REQUEST['id']))
                        $rs = GetUser($_REQUEST['id']);
                else
                        $rs = NewUser();
        }
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edit User: <?=$rs['value']?> </title>
        <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
        <? if(isset($errors)) { ?>
                <ul class="error">
                        <? foreach($errors as $key => $error){ ?>
                                <li><?=$key?>: <?=$error?></li>
                        <? } ?>
                </ul>
        <? } ?>
        <form method="post">
                        <div>
                                <label>ID:</label>
                                <?=$rs['id']?>
                        </div>
                        <div>
                                <label for="Value">Value:</label>
                                <input  type="text" name="Value" id="Value"
                                                class="<? if(isset($errors['Value'])){ ?>error<? } ?>"
 	                                                value="<?=$rs['Value']?>" />
                                                <? if(isset($errors['Value'])){ ?>
                                                        <span class="error"><?=$errors['Value']?></span>
                                                <? } ?>
                        </div>
                        
                        <div>
                                <label for="category_id">category_id</label>
                                <input  type="text" name="category_id" id="category_id"
                                                class="<? if(isset($errors['category_id'])){ ?>error<? } ?>"
 	                                                value="<?=$rs['category_id']?>" />
                                                <? if(isset($errors['category_id'])){ ?>
                                                        <span class="error"><?=$errors['category_id']?></span>
                                                <? } ?>
                        </div>
                        
                        <div>
                                <label for="person_id">person_id</label>
                                <input  type="text" name="person_id" id="person_id"
                                                class="<? if(isset($errors['person_id'])){ ?>error<? } ?>"
 	                                                value="<?=$rs['person_id']?>" />
                                                <? if(isset($errors['person_id'])){ ?>
                                                        <span class="error"><?=$errors['person_id']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label>Creation Date:</label>
                                <?=$rs['created_at']?>
                        </div>
                        <div>
                                <label>Last Updated:</label>
                                <?=$rs['updated_at']?>
                        </div>
                       
                        <input type="submit" name="Submit" value="Submit" />
                        <a href="connectionmethods.php">Cancel</a>
        </form>
</body>
</html>

