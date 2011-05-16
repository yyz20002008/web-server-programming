<?
        require_once('../inc/global.php');
        require_once('DataAccess.php');
        $result = GetProducts();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Home</title>
</head>
<body>

<b>This is the Final Project </b><br/>
<em>@Yanzhao Yang</em><br/>


<table width="1200" border="0">
<tr>
<td colspan="2" style="background-color:#FFA500;">
<h1><center>Welcome to YzY E-Store</center></h1>
</td>
</tr>

<tr valign="top">
<td style="background-color:#FFD700;width:100px;text-align:top;">
<b>Menu</b><br />
<b><a href="admin.php">ADMINISTATOR</a></b><br/>
</td>
<td style="background-color:#eeeeee;height:200px;width:400px;text-align:top;">

<div id="tableWrapper">
<!-- --------------------------------------------------------------------------------------------- -->
<form class="list">
<table border="0" cellspacing="30" >
                        <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Product</th>                                
                                <th>Description</th>
                                <th>Price</th> 
                                                          
                        </tr>
        
        
        <?
        
                while($rs = $result->fetch_assoc()){
                        include 'item.php'; 
                }
                
        ?>
                 
       
</table>
 <input type="submit" style= "height:60;font-size:12pt;font-family:Arial;color:#4CC417;background:#6600FF " value="ADD TO CART" />
</form>

</div>



        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript">
                $(function(){
                        
                        $(".list").live('submit',function(){
                                var form = $(this);//.closest("form");
                              alert (form.serialize());
                                
                                $.post('order.php', form.serialize(), function(data){
                                 
                                   //$("#tableWrapper").hide();
                                    
                                   $("#tableWrapper").html(data);
                           
                              });
                                
                                return false;
                        });


                        $(".order").live('submit',function(){
                            var form = $(this);//.closest("form");
                            alert (form.serialize());
                            $.post('checkout.php', form.serialize(), function(data){
                                $("#tableWrapper").html(data);
                         //           record_row = form.closest(".record_row");
                         //           if(record_row.length == 0)
                         //                   $("table:eq(0)").append(data);
                         //           else
                         //                   record_row.replaceWith(data);
                          });
                            
                            return false;
                    });

                        });
                     </script>




<!-- - <img src="./image/addtocart.gif" alt=""/>-->
</td>
</tr>

<tr>
<td colspan="2" style="background-color:#FFA500;text-align:center;">

Copyright © 2011 SUNY New Paltz YanzhaoYang</td>
</tr>
</table>



 
</body>
</html>


