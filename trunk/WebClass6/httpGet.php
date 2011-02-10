<h1>All about New Paltz</h1>
<p>
        Blah Blah Blah
</p>
<?php
        $querystring = http_build_query($_POST);
       
        $results = json_decode(
                file_get_contents("https://ajax.googleapis.com/ajax/services/search/images?v=1.0&$querystring")
                );
?>
<a href="http://www.google.com/search?<?=$querystring?>">CLick Here for even more info.</a>

<form action="" method="post">
        <input type="text" name="q" />
        <select name="hl">
                <option value="en">English</option>
                <option value="fr">French</option>
                <option value="he">Hebrew</option>
        </select>
        <input type="submit" name="submit" value="Submit" />
</form>

<?php foreach($results->responseData->results as $ob){?>
<pre>
<img src="<?=$ob->url?>" />
</pre>
<?php  } ?>

