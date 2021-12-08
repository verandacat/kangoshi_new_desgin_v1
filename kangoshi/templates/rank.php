
<div class="ranking">
  <?php wp_reset_postdata(); ?><?php $the_query = new WP_Query( $args );
$i = 1;
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
$url = get_field('url');
$radarImg = get_field('radarImg');
$starImg = get_field('starImg');
$number = get_field('number');
$numberB = get_field('number-baito');

$point1 = get_field('points')['point1'];
$point2 = get_field('points')['point2'];
$point3 = get_field('points')['point3'];
$pointDes = get_field('points')['pointDes'];
$featureTop = get_field('feature')['featureTop'];
$featureImg = get_field('feature')['featureImg'];
$featureBottom = get_field('feature')['featureBottom'];

 ?>
  <div class="ranking__content">
    <h3 class="content__title"><img src="<?php bloginfo('template_url'); ?>/images/icons/badge--0<?php echo $i; ?>.svg" alt=""/><a class="prrrr" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank"><?php the_title(); ?></a></h3>
    <div class="content__top">
      <div class="top__left"><img src="<?php echo $radarImg ?>" alt=""/></div>
      <div class="top__right">
        <div class="right__hyouka">
          <span class="hyouka__title">総合評価</span>
          <span class="hyouka__star"><?php star($i); ?></span>
          <span class="hyouka__number">
          <?php if(is_page('baito')) : ?>
          <?php echo $numberB; ?>
          <?php else : ?>
          <?php number($i); ?>
          <?php endif; ?>
        </span>
        </div>
        <div class="right__points">
          <div class="points__title"> <img src="<?php bloginfo('template_url'); ?>/images/icons/point__title.svg" alt=""/></div>
          <ul class="points__list list">
            <li class="list__point"><?php echo $point1; ?></li>
            <li class="list__point"><?php echo $point2; ?></li>
            <?php if(!empty($point3)) : ?>
            <li class="list__point"><?php echo $point3; ?></li>
            <?php endif; ?>
          </ul>
          <div class="points__descript">
            <p><?php echo $pointDes; ?></p>
          </div>
          <div class="btnBox--small points__btn"><a class="prrrr btn" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank"><span>公式サイトはこちら</span><i class="fas fa-arrow-right"></i></a></div>
        </div>
      </div>
    </div>
    <div class="content__bottom">
      <h3 class="sub__title"><span class="pink">【<?php the_title(); ?>】</span><span class="f-md">の</span>ここがすごい！</h3>
      <div class="bottom__top"><?php echo $featureTop; ?></div>
      <div class="bottom__img"> <img src="<?php echo $featureImg; ?> " alt=""/></div>
      
      <div class="btnBox--big all__btn">
        <?php if(!is_mobile()) : ?>
        <span class="red f-13">▼約60秒で登録完了！＆利用は完全無料▼</span>
        <?php else: ?>
        <span class="red f-13">▼約30秒で登録完了！＆利用は完全無料▼</span>
        <?php endif; ?>
        <a class="prrrr btn" href="<?php echo home_url('/'); ?><?php echo $url; ?>" target="_blank"><span><?php the_title(); ?>に登録する</span><i class="fas fa-arrow-right"></i></a></div>
    </div>
  </div><?php $i++; endwhile; endif; wp_reset_query(); ?>
</div>