<?
        
        //include("common.inc");
        $connection = mysql_connect('', 'N02202273', 's051187');
        mysql_select_db("N02202273_db", $connection); 
        if(isset($_POST['queryString'])) {
                        $queryString = $_POST['queryString'];           
                        if(strlen($queryString) >0) {
                                $query = "SELECT name FROM state WHERE name LIKE '$queryString%' LIMIT 10";
                                $result = mysql_query($query) ;
                                        while($row = mysql_fetch_array($result)){
                                        echo '<li onClick="fill(\''.$row[name].'\');">'.$row[name].'</li>';                                         
      }
          }
          }
?>
