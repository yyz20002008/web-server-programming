<?
        require_once('../Inc/global.php');
        $conn = getConnection();
        echo $conn->connect_error;
        $result = $conn->query('SELECT * FROM People P Join Address A ON A.Person_id=P.id');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>dsfsdfsf</title>
</head>
<body>
<table border="1">
        
        <? while($rs = $result->fetch_assoc()){ ?>
                <? if(!isset($somevar)){ $somevar=true; ?>
                        <tr>
                        <? foreach($rs as $key => $value){ ?>
                                <th><?=$key?></th>
                        <? } ?>
                        </tr>
                <? } ?>
                <tr>
                        <? foreach($rs as $value){ ?>
                                <td><?=$value?></td>
                        <? } ?>
                </tr>   
        
        <? } ?>
        
</table>

</body>
</html>
