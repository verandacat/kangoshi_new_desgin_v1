
<?php if(is_page('baito')) : ?>
<?php 
  $noEmpty = !'';

  $args = array(
      'posts_per_page' => -1,
      'post_type' => 'kangoshi',
      'category_name' => 'baito',
      'orderby' => 'meta_value_num',
      'post_status' => 'publish',
      'order' => 'asc',
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'rank-baito',
          'value'   => $noEmpty,
          'compare' => '>=', 
        ),
      )
  );
?>
<?php elseif(is_search()) : ?>
  <?php 
    if (isset($_GET['b'])) {
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'kangoshi',
        'meta_key' => 'rank-baito',
        'orderby' => 'meta_value_num',
        'post_status' => 'publish',
        'order' => $sort_order,
        's' => $s,
        'meta_query' => array($metaquerysp),
        'category_name' => 'baito',
    ); 
    } else {
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'kangoshi',
        'meta_key' => $sort_key,
        'orderby' => 'meta_value_num',
        'post_status' => 'publish',
        'order' => $sort_order,
        's' => $s,
        'meta_query' => array($metaquerysp),
    ); 
  }
?>
<?php else : ?>
<?php $args = array(
          'posts_per_page' => -1,
          'post_type' => 'kangoshi',
          'meta_key' => 'rank',
          'post_status' => 'publish',
          'orderby' => 'meta_value_num',
          'order' => 'asc',
      );
?>
<?php endif; ?>

<?php function star($val) { ?><?php if($val==1) { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/star--01.svg" alt="1"/><?php } elseif($val==2) { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/star--02.svg" alt="2"/><?php } elseif($val==3) { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/star--02.svg" alt="3"/><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/star--03.svg" alt="4"/><?php } ?><?php }
?>

<?php function maru($val) { ?><?php if($val==1) { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/maru--01.svg" alt="1"/><?php } elseif($val==2) { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/maru--02.svg" alt="2"/><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/icons/maru--03.svg" alt="3"/><?php } ?><?php } ?>

<?php $the_query = new WP_Query( $args ); ?>
<div class="hikaku">
  <div class="hikaku__wrap">
    <table id="hikaku">
      <colgroup>
        <col width="6%"/>
        <col width="17%"/>
        <col width="14%"/>
        <col width="12%"/>
        <col width="17%"/>
        <col width="8%"/>
        <col width="8%"/>
        <col width="6%"/>
      </colgroup>
      <tr> 
        <th></th>
        <th>会社</th>
        <th>満足度</th>
        <th>求人数</th>
        <th>求人の種類</th>
        <th>対応速度</th>
        <th>サービス</th>
        <th>地域</th>
        <th>詳細</th>
      </tr>
      
      <?php wp_reset_postdata(); ?>
      <?php $i = 1;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
        $url = get_field('url');
        $logo = get_field('logoImg');
        $starImg = get_field('starImg');
        $number = get_field('number');
        $numberB = get_field('number-baito');
        $jobNum = get_field('jobNum');
        $genre = get_field('genre');
        $speed = get_field('speed');
        $speedB = get_field('speed-baito');
        $service = get_field('service');
        $serviceB = get_field('service-baito');
        $area = get_field('area');
        $rankB = get_field('rank-baito');   
      
          
        ?>
      <tr>
        <th><span class="f-20"><?php echo $i; ?></span>位</th>
        <td><a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">
            <p class="font__bold"><?php the_title(); ?></p><img src="<?php echo $logo; ?>" alt="" width="99%"/></a></td>
        <td><a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">
          <?php if(is_page('baito') || isset($_GET['b'])) : ?>
            <p><?php echo $numberB; ?></p>
          <?php else : ?>
            <p><?php echo $number; ?></p>
          <?php endif; ?>
            <p class="star--block"><?php star($i); ?></p></a></td>
        <td>
          <p><?php echo $jobNum; ?></p>
        </td>
        <td> 
          <p><?php foreach($genre as $value) {echo $value.', '; } ?></p>
        </td>
        <td> 
          <p>
            <?php if(is_page('baito') || isset($_GET['b'])) : ?>
            <?php maru($speedB); ?>
            <?php else : ?>
            <?php maru($speed); ?>
            <?php endif; ?>
          </p>
        </td>
        <td> 
          <p>
            <?php if(is_page('baito') || isset($_GET['b'])) : ?>
            <?php maru($serviceB); ?>
            <?php else : ?>
            <?php maru($service); ?>
            <?php endif; ?>
        </p>
        </td>
        <td> 
          <p><?php echo $area; ?></p>
        </td>
        <td class="btn"> <a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">公式サイトはこちら</a></td>
      </tr>
     
      <?php $i++; endwhile; endif; wp_reset_query(); ?>
    </table>
  </div>
</div>