<?php
        //if(!isset($section)) $section = 'home';
        $arr =array('home','links','about','pictures'
        );
        
?>

        <div class="tabbar">
        <div class="tab <?php echo $arr[0] ? 'currenttab' : '' ?>">
                <a href="tabhome.php">
                        
                        <?php echo $arr[0]?>
                </a>
        </div>
        <div class="tab <?php echo $arr[1] ? 'currenttab' : '' ?>">
            <a href="tablinks.php">
                         <?php echo $arr[1]?>
            </a>
        </div>
        <div class="tab <?php echo $arr[2] ? 'currenttab' : '' ?>">
            <a href="tababout.php">
                          <?php echo $arr[2]?>
            </a>
        </div>
        <div class="tab <?php echo $arr[3] ? 'currenttab' : '' ?>">
            <a href="tabpictures.php">
                         <?php echo $arr[3]?>
            </a>
        </div>

        <br clear="all" />
    </div>

