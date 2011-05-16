<?
        require_once('../inc/global.php');
        require_once('DataAccess.php');
        $result = GetOrder();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>AdminTable</title>
</head>

<body>
<table border="1">
                        <tr>
                                <th>Order_id</th>
                                <th>Trans_number</th>
                                <th>Amount</th>
                                <th>Address</th>
                        </tr>
       
        <? while($rs =$result->fetch_assoc()){ 
        	  
              include 'row.php'; 
              
        } ?>
       
        <tr>
        <th>Pro_id</th>
        <th>ProductName</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Price</th>
        <th>CreateAt</th>
        <th>UpdateAt</th>      
        </tr>
        <? 
           $result2=GetProducts();
           while($rs2 =$result2->fetch_assoc()){?> 
        	  
            <tr >
                      
                        <td align="center"><?=$rs2['pro_id']?></td>
                        <td align="center"><?=$rs2['pro_name']?></td>
                        <td align="center"><?=$rs2['description']?></td>
                        <td align="center"><?=$rs2['stock']?></td>
                        <td align="center">$<?=$rs2['price']?></td>
                        <td align="center"><?=$rs2['created_at']?></td>
                        <td align="center"><?=$rs2['updated_at']?></td>
              </tr>
        	
              
        <? } ?>
       


        <tr>
        
        <td><a href="index.php">Back</a></td>
        </tr>
</table>
</body>
</html>