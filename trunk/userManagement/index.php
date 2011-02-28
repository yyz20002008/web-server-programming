<?php
 require_once('../inc/global.php');
 $conn=getConnect();
  echo $conn->connect_error;
  $result =$conn->query('SELECT* FROM People');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<table>
<tr><th>Id</th> <th>FirstName</th><th>LastName</th></tr>
</table>>
<? while ($rs=$result->fetch_assox()){?>
  <?if (!isset($somevar)){$somevar=true;?>
     <tr> 
     <?php foreach($rs as $key => $value){?>
          <th><?=$key?></th>>
     <?}?>
     </tr>  
  <?}?> 
   <tr>
     <?foreach($rs as $value){?>
     
     	<td><?=$value?></td>
     	
    
     <?}?>
  </tr>
<?}?>

<?php echo 'k';?>
</body>
</html>