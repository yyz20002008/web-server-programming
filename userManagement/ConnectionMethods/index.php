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
<a href="csv.php">Download</a>
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
                                var form = $(this);
                                $.post(form.attr('action'), form.serialize(), function(data){
                                        record_row = form.closest(".record_row");
                                        if(record_row.length == 0)
                                                $("table:eq(0)").append(data);
                                        else
                                                record_row.replaceWith(data);
                                });
                                
                                return false;
                        })
                        $('.edit_link').live('click',function(){
                                var editlink = $(this);
                                $.get("controler.php?action=edit&id=" + editlink.attr('data-id'),function(data){
                                        editlink.closest("tr").find("td").hide();
                                        formTd = $("<td></td>")
                                                .attr("colspan",4)
                                                .html(data)
                                                .appendTo(editlink.closest("tr"));
                                        formTd.find("select").each(function(){
                                                $(this).val($(this).attr('data-value'));
                                        });
                                });
                                return false;
                        });
                });
                $('.cancel_link').live('click',function(){
                        $(this).closest(".record_row").find("td").show();
                        $(this).closest("form").closest("td").detach();
                        return false;
                });
                $('.delete_link').live('click',function(){
                        record_row = $(this).closest(".record_row");
                        if(confirm("Are you sure you want to delete this Record?")){
                                $.post(this.href,function(data){
                                        
                                        if(data.status == 'Success')
                                        {
                                                record_row.hide('slow');
                                        }else{
                                                $("<div></div>").css({"position":"absolute"}).html(data.Error).appendTo(record_row);
                                        }
                                }, 'json');
                        }
                        return false;
                });
        </script>

</body>
</html>

