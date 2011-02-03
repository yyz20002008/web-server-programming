<?php
        if(!isset($section)) $section = 'home';
        $arr =array('Sunday'=>'First Day of week',
                    'Monday'=>'Something else',
                    'Tuesday'=>array ('10:00',11,12.5)
        );
        $FirstName ="Yanzhao";
        $LastName ="Yang";
        $Name = $FirstName.' '.$LastName;
        echo "Hello $Name";
        
?>

        <div class="tabbar">
        <div class="tab <?php echo $section=='home' ? 'currenttab' : '' ?>">
                <a href="tabhome.php">
                        Home
                </a>
        </div>
        <div class="tab <?php echo $section=='links' ? 'currenttab' : '' ?>">
            <a href="tablinks.php">
                        Links
            </a>
        </div>
        <div class="tab <?php echo $section=='about' ? 'currenttab' : '' ?>">
            <a href="tababout.php">
                         About
            </a>
        </div>
        <div class="tab <?php echo $section=='pictures' ? 'currenttab' : '' ?>">
            <a href="tabpictures.php">
                         Pictures
            </a>
        </div>
      
        <br clear="all" />
    </div>

