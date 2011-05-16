<?

        require_once('../inc/global.php');
        require_once('DataAccess.php');
        $result = GetState();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<table border="1">
             
       
        <tr>
        <th>Id</th>
        <th>Code</th>
        <th>StateName</th>
             
        </tr>
        <? 
           
           while($rs=$result->fetch_assoc()){?> 
        	  
            <tr >
                      
                        <td align="center"><?=$rs['id']?></td>
                        <td align="center"><?=$rs['code']?></td>
                        <td align="center"><?=$rs['name']?></td>
                        
              </tr>
        	
              
       <? } ?>
</table>
</body>
</html>