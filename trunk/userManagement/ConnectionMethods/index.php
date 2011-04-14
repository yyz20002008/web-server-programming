<?
        require_once('../../inc/global.php');
        require_once('DataAccess.php');
        $result = GetConnectionMethods();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<div id="tableWrapper">
<table border="1">
                        <tr>
                                <th>Actions</th>
                                <th>Person Id</th>
                                <th>Category Id</th>
                                <th>Value</th>
                        </tr>
        
        <?
                while($rs = $result->fetch_assoc()){
                        include 'row.php'; 
                }
        ?>
        
</table>
</div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript">
                $(function(){
                        $.get("controler.php?action=new",function(data){
                                $("#tableWrapper").append(data);
                        });
                        $("form").live('submit',function(){
                                $.post($(this).attr('action'), $(this).serialize(), function(data){
                                        $("table:eq(0)").append(data);
                                });
                                
                                return false;
                        })
                        $('.edit_link').live('click',function(){
                                $.get("controler.php?action=edit&id=" + $(this).attr('data-id'),function(data){
                                                                
                                        $("#tableWrapper").append(data);
                                });
                                return false;
                        });
                });
        </script>

</body>
</html>
