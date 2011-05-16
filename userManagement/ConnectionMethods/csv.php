<?
        require_once('../../inc/global.php');
        require_once('DataAccess.php');
        $result = GetConnectionMethods();
        header('Content-Type:   text/csv');
?>
        <?
                while($rs = $result->fetch_assoc()){
                        join(',', array_keys($rs));
                        echo "\n";
                        echo join(',',$rs);
                        echo "\n";
                }
        ?>

