<?
        require_once('../inc/global.php');
        require_once('DataAccess.php');
        $info=$_REQUEST;
        //print_r($info);
        reset($info);
        $flag=0;
        $i=0;
        $j=0;
        while (list($key, $val) = each($info))
        {
        	if($flag==0)
        	{
        		$qty[$i]=$val;
        		//echo "$i=>$val<br/>"; 
        		$flag=1;
        		$i++;
        	}
        	else {
        	$pid[$j]=$val;
        	//echo "$j=>$val<br/>"; 
        	$flag=0;
        	$j++;
        	}
         }  
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CheckOut</title>
</head>
<body>



<table border="1" cellspacing="20" >
                        <tr>
                              
                                <th>Product</th>                                
                                <th>Description</th>
                                <th>Price</th>  
                                <th>QTY</th>
                                                      
                        </tr>
                     
        <?
                $amount=0;
                $m=0; 
                foreach($pid as $i)
                {
                	echo $i;
                	$rs=GetProduct($i);
                	$q=$qty[$m];
                	$amount=$amount+$rs[price]*$q;
                	
                	include ('item3.php');
                	$m++;
                      
                }
                
        ?>
                      
</table>
<div align="right"><b>Amount:</b>$<?=$amount?></div>

<form  action="shopping.php" method="post">
<input type="submit" value="placeorder"/>
<input type="hidden" name="amount" value="<?=$amount?>"/>
Address: <input type="text" name="address"/>
Credit Card Number:<input type="text" name="credit"/>
expire date: <input type="text" name="expdate" />
<input type="hidden" name="quatity" value="<?=$qty?>"/> 
<input type="hidden" name="pro_id" value="<?=$pid?>"/> 
</form>








<a href="index.php"><button>Back</button></a>



</body>
</html>
