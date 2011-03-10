<?
        require_once('../inc/global.php');
        require_once('userData.php');
        if(isset($_REQUEST['Submit']))
        {
                if($errors = DeleteUser($_REQUEST['id'])) print_r($errors);
                else header("location: index.php");
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
                                Are you sure that you want to delete <b><?=$rs['FirstName']?> <?=$rs['LastName']?></b> 
                        </div>
                        
                        <input type="submit" name="Submit" value="Submit" />
                        <a href="./">Cancel</a>
        </form>
</body>
</html>
