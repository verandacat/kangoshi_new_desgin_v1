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