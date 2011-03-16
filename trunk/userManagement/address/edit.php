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
                                        header("location: address.php");
                        }else{
                                if(!$errors = CreateUser($rs))
                                        header("location: address.php");
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
        <title>Edit User: <?=$rs['Address']?> <?=$rs['City']?></title>
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
                                <label for="Address">Address:</label>
                                <input  type="text" name="Address" id="Address"
                                                class="<? if(isset($errors['Address'])){ ?>error<? } ?>"
 	                                                value="<?=$rs['Address']?>" />
                                                <? if(isset($errors['Address'])){ ?>
                                                        <span class="error"><?=$errors['Address']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label for="City">City:</label>
                                <input  type="text" name="City" id="City"
                                                class="<? if(isset($errors['City'])){ ?>error<? } ?>"
                                                value="<?=$rs['City']?>" />
                                                <? if(isset($errors['City'])){ ?>
                                                        <span class="error"><?=$errors['City']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label for="State">State:</label>
                                <input  type="text" name="State" id="State"
                                                class="<? if(isset($errors['State'])){ ?>error<? } ?>"
                                                value="<?=$rs['State']?>" />
                                                <? if(isset($errors['State'])){ ?>
                                                        <span class="error"><?=$errors['State']?></span>
                                                <? } ?>
                        </div>
                        <div>
                                <label for="Zip">Zip:</label>
                                <input  type="text" name="Zip" id="Zip"
                                                class="<? if(isset($errors['Zip'])){ ?>error<? } ?>"
                                                value="<?=$rs['Zip']?>" />
                                                <? if(isset($errors['Zip'])){ ?>
                                                        <span class="error"><?=$errors['Zip']?></span>
                                                <? } ?>
                        </div>
                        
                        <div>
                                <label for="Country">Country:</label>
                                <input  type="text" name="Country" id="Country"
                                                class="<? if(isset($errors['Country'])){ ?>error<? } ?>"
                                                value="<?=$rs['Country']?>" />
                                                <? if(isset($errors['Country'])){ ?>
                                                        <span class="error"><?=$errors['Country']?></span>
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
                        <a href="address.php">Cancel</a>
        </form>
</body>
</html>

