
<?php if(is_search()) : ?>
  <?php 
    
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



<?php $the_query = new WP_Query( $args ); ?>
<div class="hikaku">
  <div class="hikaku__wrap">
    <table id="hikaku" class="tab-hikaku-03">
      <colgroup>
        <col width="6%"/>
        <col width="14%"/>
        <col width="14%"/>
        <col width="14%"/>
        <col width="20%"/>
        <col width="9%"/>
      </colgroup>
      <tr> 
        <th></th>
        <th>会社</th>
        <th>求人職種</th>
        <th>ハローワーク求人</th>
        <th>対応エリア</th>
        <th>詳細</th>
      </tr>
      
      <?php wp_reset_postdata(); ?>
      <?php $i = 1;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
        $url = get_field('url');
        $rank = get_field('rank');
        $logo = get_field('logoImg');
        $hikoukai = get_field('tab3-01');
        $harowork = get_field('tab3-02');
        $support = get_field('tab3-03');
      
        ?>
      <tr>
        <th><span class="f-20"><?php echo $rank; ?></span>位</th>

        <td><a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">
            <p class="font__bold"><?php the_title(); ?></p><img src="<?php echo $logo; ?>" alt="" width="99%"/></a></td>
        <td> 
          <p>
            <?php maru($hikoukai); ?>
            <?php if($hikoukai == 1) {
              echo "<br><span>かなり多い</span>";
            } else {
              echo "<br><span>多い</span>";
            } ?>
          </p>
        </td>

        <td> 
          <p>
            <?php maru($harowork); ?>
            <?php if($harowork == 2) {
              echo "<br><span>あり</span>";
            } else {
              echo "<br><span>なし</span>";
            } ?>
          </p>
        </td>

        <td> 
          <p>
            <?php echo $support; ?>
          </p>
        </td>
        
        <td class="btn">
          <a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">公式サイトはこちら</a>
        </td>
      </tr>
     
      <?php $i++; endwhile; endif; wp_reset_query(); ?>

    </table>
  </div>
</div>