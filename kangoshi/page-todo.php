<?php
/* Template Name: 都道府県個別ページ */
?>

<?php include "templates/args.php"; ?>
<?php get_header(); ?>
<div id="wrapper">
  <main id="main">
    <section id="section__todo--title">
      <h2 class="todo__title">
        <div class="center">
          <img src="<?php bloginfo('template_url'); ?>/images/icons/todo__title--icon.png" alt="">
        <?php if($_GET['todo'] !== null) : ?>
          <span class="f-30 first-text">
            <span class="bg-y bold"><?php echo $_GET['todo']; ?></span>に強い！
          </span>
          <br>
          <?php if(is_mobile()) : ?>
          <span class="f-18 second-text">看護師転職ランキング</span>
          <?php else : ?>
          <span class="f-24 second-text">看護師転職ランキング</span>
          <?php endif; ?>
          <?php else : ?>
          <span class="f-30 first-text">
            <span class="pink">
              お住まいの地域で
            </span>
          </span>
          <br>
          <span class="f-18 second-text">お勧めの転職サイトをチェック！</span>
          <?php endif; ?>
        </div>
      </h2>
      <img src="<?php bloginfo('template_url'); ?>/images/icons/todo__icon.png" alt="" class="todo__icon">
      <div class="todo__descript">
        <p>「<span class="bold">あそこのサイトに登録しておけば、休日が多く、給料の高い求人があったのに・・・</span>」なんてことにならないように、最低でも<span class="pink bold">2～3サイト登録</span>するのが転職で失敗しない大事なポイントですよ！</p>
        <img src="<?php bloginfo('template_url'); ?>/images/icons/todo__des--icon.png" alt="" class="todo__desicon">
      </div>
    </section>
   
    <!-- <section id="section__point">
      <h2 class="point__title h2__title">
        <div><span class="f-24">成功するための</span><br>看護師求人・転職サイト選び<br>３つのポイント </div>
      </h2><?php //include "templates/point-content.php"; ?>
    </section> -->
    <!-- RANKING -->
    <section id="section__ranking" style="margin-top: 0;">
      
        <?php include "templates/rank.php"; ?>
    </section>
    <section id="section__hikaku">
      <h2 class="hikaku__title h2__title">
        <div><span class="f-24">転職成功者が使った</span><br>看護師求人・転職サイト</div>
      </h2><?php include "templates/hikaku-tab.php"; ?>
    </section>
    <section id="section__worker">
      <?php include "templates/foot-content.php"; ?>
    </section><?php get_search_form(); ?>
    <section id="section__foot">
      <div class="foot__map">
        <?php include "templates/map-content.php"; ?></div>
      <div class="foot__column"><?php include "templates/col-content.php"; ?></div>
    </section>
  </main>
</div><?php get_footer(); ?>