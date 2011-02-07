<?
$string="How are you doing";
$arr= array(array("First"=>"Yan","Last"=>"Zhao"),
            array("First"=>"Dan","Last"=>"Yu"));
$arr["two"]="James"; 


//echo "hello". $string;
//or
//echo "hello $string";
//or
//echo 'hello $string';
?>
<?foreach($arr as $key => $person):?>
    <h1>Hello<?=$person["First"]?><?=$person["Last"]?></h1>
<? endforeach;?>
<h1>Hello<?=$string?></h1>

<h1>Hello<?=$arr[0]?></h1>
<h1>Hello<?=$arr[1]?></h1>
<h1>Hello<?=$arr["two"]?></h1>