<?php function star($val) { ?>
<?php if($val==1) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/star--01.svg" alt="1"/>
<?php } elseif($val==2) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/star--02.svg" alt="2"/>
<?php } elseif($val==3) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/star--02.svg" alt="3"/>
<?php } else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/star--03.svg" alt="4"/>
<?php } ?>
<?php } ?>

<?php function number($val) {
  if($val == 1) {
    echo "5.0";
  } elseif($val == 2) {
    echo "4.7";
  } elseif($val == 3) {
    echo "4.5";
  } elseif($val == 4) {
    echo "4.3";
  } else {
    echo "4.0";
  }
} 
?>

<?php function maru($val) { ?>
<?php if($val==1) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/maru--01.svg" alt="1"/>
<?php } elseif($val==2) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/maru--02.svg" alt="2"/>
<?php } elseif($val==3) { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/maru--03.svg" alt="3"/>
<?php } else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/icons/maru--04.svg" alt="4"/>
<?php } ?> 
<?php } ?>