1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28

	

<?
        require_once('../inc/global.php');
        require_once('userData.php');
        if(isset($_REQUEST['Submit']))
        {
                if($errors = DeleteUser($_REQUEST['id'])) print_r($errors);
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
                                Are you sure that you want to delete <b><?=$rs['FirstName']?> <?=$rs['LastName']?></b>
                        </div>
                       
                        <input type="submit" name="Submit" value="Submit" />
                        <a href="./">Cancel</a>
        </form>
</body>
</html>

