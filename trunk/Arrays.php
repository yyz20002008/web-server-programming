<?
$string="How are you doing";
$arr= array(array("Yan","Zhao"),
            array("First"=>"Dan","Last"=>"Yu"));
$arr["two"][0]="James"; 
$arr["two"][1]="Yang"; 


//echo "hello". $string;
//or
//echo "hello $string";
//or
//echo 'hello $string';
?>
<?foreach($arr as $person):
    list($firstName, $lastName)=$person;
    
    
?>
    <h1><?="hello$firstName $lastName"?></h1>
<? endforeach;?>
<h1>Hello<?=$string?></h1>

<h1>Hello<?=$arr[0]?></h1>
<h1>Hello<?=$arr[1]?></h1>
<h1>Hello<?=$arr["two"]?></h1>
<pre>
<? print_r($_SERVER); ?>
</pre>
<?phpinfo();?>>