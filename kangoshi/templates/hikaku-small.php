<div class="hikaku__small">
  <table id="ctt__table">
    <colgroup>
      <col width="20%">
      <col width="20%">
      <col width="20%">
      <col width="20%">
      <col width="20%">
    </colgroup>
    <tr>
      
      <?php for($k = 1; $k <= 5; $k++ ) : ?>
      
      <th>
        <p><span class="bold f-20"><?php echo $k; ?></span>位</p>
      </th>
      <?php
        if(is_page('baito')) {
          if ($k == 4) {
            break;
          }
        }
        ?>
      <?php endfor; ?>
    </tr>
    <tr>
      <?php if(is_page('baito')) : ?>
      <?php
          $noEmpty = !'';
          $args = array(
            'posts_per_page' => -1,
            'post_type' => 'kangoshi',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
            'post_status' => 'publish',
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
      <?php else : ?>
      <?php
          $args = array(
            'posts_per_page' => -1,
            'post_type' => 'kangoshi',
            'meta_key' => 'rank',
            'post_status' => 'publish',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
          );
      ?>
      <?php endif; ?>
      <?php
          $the_query = new WP_Query( $args );

            $i = 1;
            if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
            $url = get_field('url');
            $image_id = get_post_thumbnail_id ();
            $image_url = wp_get_attachment_image_src ($image_id, true);
        ?>
      <td>
        <a href="<?php echo home_url("/"); ?><?php echo $url; ?>" class="prrrr" target="_blank">
          <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>">
        </a>
      </td>
      <?php $i++; endwhile; endif; ?>
    </tr>

    <tr>
    <?php
      $the_query = new WP_Query( $args );
      $i = 1;
      if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
      $des = get_field('ctt-descript');
    ?>
    <td>
      <p class="ctt__descript">
        <?php echo $des; ?>
      </p>
    </td>
    <?php $i++; endwhile; endif; ?>
    </tr>

    <tr>
      <?php
        $the_query = new WP_Query( $args );
        $i = 1;
        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
        $url = get_field('url');
      ?>
      <td>
        <a href="<?php echo home_url("/"); ?><?php echo $url; ?>" class="prrrr btn__small" target="_blank">
           公式サイトへ
        </a>
      </td>
      <?php $i++; endwhile; endif; ?>
    </tr>
  </table>
</div>