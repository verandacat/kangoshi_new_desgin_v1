
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
    <table id="hikaku" class="tab-hikaku-02">
      <colgroup>
        <col width="6%"/>
        <col width="14%"/>
        <col width="14%"/>
        <col width="14%"/>
        <col width="14%"/>
        <col width="9%"/>
      </colgroup>
      <tr> 
        <th></th>
        <th>会社</th>
        <th>求人職種</th>
        <th>勤務形態</th>
        <th>対応エリア</th>
        <th>詳細</th>
      </tr>
      
      <?php wp_reset_postdata(); ?>
      <?php $i = 1;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
        $url = get_field('url');
        $logo = get_field('logoImg');
        $rank = get_field('rank');
        $kyujinType = get_field('tab2-01');
        $kinmuType = get_field('tab2-02');
        $areaType = get_field('tab2-03');
      
        ?>
      <tr>
        <th><span class="f-20"><?php echo $rank; ?></span>位</th>

        <td><a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank">
            <p class="font__bold"><?php the_title(); ?></p><img src="<?php echo $logo; ?>" alt="" width="99%"/></a></td>
        
        <td> 
          <p style="font-size: 1rem;">
            <?php 
              foreach($kyujinType as $index => $value) {
                echo $value."<br>";
              } 
            ?>
            <?php if($post->ID == 362) {
              echo "<small>※学生は要資格取得済み</small>";
            }
            ?>
          </p>
        </td>

        <td> 
          <p>
            <?php 
              foreach($kinmuType as $index => $value) {
                echo $value."<br>";
              } 
            ?>
          </p>
        </td>

        <td> 
          <p>
            <?php maru($areaType); ?>
            <?php echo "<br><span>全国</span>"; ?>
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