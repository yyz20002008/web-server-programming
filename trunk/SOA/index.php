<?php 
        $url = "http://api.flickr.com/services/feeds/photos_public.gne?tags=New+Paltz&tagmode=any&format=json";
        
        $str = file_get_contents($url);
        $str = str_ireplace('jsonFlickrFeed(','',$str);
        $str = substr($str,0, strlen($str) -1);
        //echo $str;
        $json = json_decode($str);
        //print_r($json);
        
        foreach($json->items as $item)
        {
                ?>
                        <img src="<?= $item->media->m?>" />
                        <?=$item->tags?>
                <?
        $url2 = "http://search.twitter.com/search.json?q=$item->tags";
        $str = file_get_contents($url2);
        $json2 = json_decode($str);
        echo $json2->results[0]->text;
        //print_r($json);
        }
        
        ?>
