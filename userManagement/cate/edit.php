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
                                        header("location: categories.php");
                        }else{
                                if(!$errors = CreateUser($rs))
                                        header("location: categories.php");
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
        <title>Edit User: <?=$rs['Name']?> </title>
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
                                <label for="Name">Name:</label>
                                <input  type="text" name="Name" id="Name"
                                                class="<? if(isset($errors['Name'])){ ?>error<? } ?>"
 	                                                value="<?=$rs['Name']?>" />
                                                <? if(isset($errors['Name'])){ ?>
                                                        <span class="error"><?=$errors['Name']?></span>
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
                        <a href="categories.php">Cancel</a>
        </form>
</body>
</html>

