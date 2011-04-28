<?
        require_once('authentication.php');
        
        if(isset($_REQUEST['refer']))
                $refer = $_REQUEST['refer'];
        elseif(isset($_SERVER['HTTP_REFERER']))
                $refer = $_SERVER['HTTP_REFERER'];
        else
                $refer = 'index.php';
                
        if(isset($_REQUEST['email']))
        {
                if(DoLogin($_REQUEST['email'], $_REQUEST['password']))
                        header("location: $refer");
        }
?>
<form method="post">
        <input type="text" name="email" />
        <input type="password" name="password" />
        <input type="hidden" name="refer" value="<?=$refer?>" />
        <input type="submit" value="Login" />
</form>
