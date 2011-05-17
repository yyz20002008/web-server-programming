<?
        require_once('../inc/global.php');
        require_once('DataAccess.php');
        $info=$_REQUEST;
       // print_r($info);
      
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Order</title>
</head>
<body>


<form   class="order"  >
<input type="submit" value="confirm"/>

<table border="1" cellspacing="20" >
                        <tr>
                              
                                <th>Product</th>                                
                                <th>Description</th>
                                <th>Price</th>  
                                <th>QTY</th>                      
                        </tr>
                     
        <?
                $amount=0;
                 
                foreach($info as $i)
                {
                	echo $i;
                	$rs=GetProduct($i);
                	//$amount+=$rs[price];
                	include ('item2.php'); 
                      
                }
                
        ?>
                      
</table>
<div align="right"><b>Amount:</b><? echo $amount;?></div>

<a href="index.php"><button>Back</button></a>


</form>
</body>
</html>


