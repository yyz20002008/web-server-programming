<?php
        //phpinfo();
        if(isset($_REQUEST['submit']))
        {
                print_r($_FILES);
                move_uploaded_file(
                        $_FILES['file1']['tmp_name'],
                        '../uploaded/' . $_REQUEST['name']
                );
                
                mail('plotkinm@newpaltz.edu','File Uploaded',"The User uploaded a file which we called $_REQUEST[name] ");
        }

?>
<form enctype="multipart/form-data" method="post">
        <label for="name">New Name of File:</label>
        <input type="text" name="name" id="name" />     
        <br />
        <label for="file1">File to Upload:</label>
        <input type="file" name="file1" id="file1" />   
        <br />
        
        <input type="submit" name="submit" value="Upload" />
</form>
