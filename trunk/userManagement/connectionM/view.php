<?
        require_once('../../inc/global.php');
        require_once('userData.php');
        $rs = GetUser($_REQUEST['id']);
        
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>View</title>
</head>
<body>
                        <div><?=$rs['id']?></div>
                        <div><?=$rs['created_at']?></div>
                        <div><?=$rs['updated_at']?></div>
                        <div><?=$rs['person_id']?></div>
                        <div><?=$rs['category_id']?></div>
                        <div><?=$rs['Value']?></div>
                   
                      
</body>
</html>

