<<?
        require_once('../inc/global.php');
        require_once('userData.php');
        if(isset($_REQUEST['Submit']))
        {
                $rs = $_REQUEST;
                if(!$errors = ValidateUser($rs))
                        if(isset($_REQUEST['id']))
                        {
                                if(!$errors = SaveUser($rs))
                                        header("location: index.php");
                        }else{
                                if(!$errors = CreateUser($rs))
                                        header("location: index.php");
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
        <title>Edit User: <?=$rs['FirstName']?> <?=$rs['LastName']?></title>
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
                                <label for="FirstName">First Name:</label>
                                <input  type="text" name="FirstName" id="FirstName"
                                                class="<? if(isset($errors['FirstName'])){ ?>error<? } ?>"
                                                value="<?=$rs['FirstName']?>" />
                                                <? if(isset($errors['FirstName'])){ ?>
                                                        <span class="error"><?=$errors['FirstName']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label for="LastName">Last Name:</label>
                                <input  type="text" name="LastName" id="LastName"
                                                class="<? if(isset($errors['LastName'])){ ?>error<? } ?>"
                                                value="<?=$rs['LastName']?>" />
                                                <? if(isset($errors['LastName'])){ ?>
                                                        <span class="error"><?=$errors['LastName']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label for="Password">Password:</label>
                                <input  type="text" name="Password" id="Password"
                                                class="<? if(isset($errors['Password'])){ ?>error<? } ?>"
                                                value="<?=$rs['Password']?>" />
                                                <? if(isset($errors['Password'])){ ?>
                                                        <span class="error"><?=$errors['Password']?></span>
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
                        <a href="./">Cancel</a>
        </form>
</body>
</html>


