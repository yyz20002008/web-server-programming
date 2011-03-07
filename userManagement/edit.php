<?
        require_once('../inc/global.php');
        require_once('userData.php');
        if(isset($_REQUEST['Submit']))
        {
                $rs = $_REQUEST;
                if($errors = ValidateUser($rs)) print_r($errors);
                elseif($errors = SaveUser($rs)) print_r($errors);
                else header("location: http://cs.newpaltz.edu/~plotkinm/WebCourse/UserManagement/");
        }else{
                $rs = GetUser($_REQUEST['id']);
        }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
        <form method="post">
                        <div>
                                <?=$rs['id']?>
                        </div>
                        <div>
                                <label for="FirstName">First Name</label>
                                <input type="text" name="FirstName" id="FirstName" value="<?=$rs['FirstName']?>" />
                        </div>
                        <div>
                                <label for="LastName">Last Name</label>
                                <input type="text" name="LastName" id="LastName" value="<?=$rs['LastName']?>" />
                        </div>
                        <div>
                                <label for="Password">Password</label>
                                <input type="text" name="Password" id="Password" value="<?=$rs['Password']?>" />
                        </div>

                        <div><?=$rs['created_at']?></div>
                        <div><?=$rs['updated_at']?></div>
                       
                        <input type="submit" name="Submit" value="Submit" />
                        <a href="./">Cancel</a>
        </form>
</body>
</html>

