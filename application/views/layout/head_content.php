   <section class="content-header">
      <h1>
        <?php echo $head; ?>
        <?php if($url2 != '#'){ ?>
        <small><?php echo $head2; ?></small>
        <?php }?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php if ($url == '#link') {echo "#";}else{echo base_url($url);}?>"><?php echo $head; ?></a></li>
        <?php if($url2 != '#'){
        echo "<li><a href='";
            if ($url2 == '#link') {
            echo "#";
            }else{
            echo base_url($url2);    
            }
        echo "'>";
        echo $head2;
        echo "</a></li>";
            if ($url3 != '#') {
            echo "<li><a href='";
                if ($url3 == '#link') {
                echo "#";
                }else{
                echo base_url($url3);    
                }
            echo "'>";
            echo $head3;
            echo "</a></li>";
                if ($url4 != '#') {
                echo "<li><a href='";
                    if ($url4 == '#link') {
                    echo "#";
                    }else{
                    echo base_url($url3);    
                    }
                echo "'>";
                echo $head4;
                echo "</a></li>";
                }
            }
        }?>
      </ol>
    </section>
