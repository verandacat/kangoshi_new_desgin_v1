
<footer id="footer">
  <div class="footer__nav">
    <ul>
      <li> <a href="<?php echo home_url('/unei'); ?>"><i class="fas fa-caret-right"></i>運営者情報</a></li>
      <li><a href="<?php echo home_url('/unei'); ?>#survey"><i class="fas fa-caret-right"></i>ランキング調査概要</a></li>
      <li><a href="<?php echo home_url('/category/'); ?>column"><i class="fas fa-caret-right"></i>コラム一覧</a></li>
    </ul>
  </div>
  <div class="footer__bottom"><a href="./"><?php if(!is_mobile()) : ?><img src="<?php bloginfo('template_url'); ?>/images/top/logo--pc.svg" alt="" width="300px"/><?php else : ?><img src="<?php bloginfo('template_url'); ?>/images/top/logo--pc.png" alt="" width="100%"/><?php endif; ?></a>
    <p>Copyright©︎ 2021 <?php bloginfo('name'); ?></p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"> </script>
<script src="<?php bloginfo('template_url'); ?>/js/storage.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/location.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/tab.js"></script>

<?php if(!is_page('baito')) : ?>
<script type="text/javascript" charset="utf-8" src="https://kenga.tech/pop-ups-waurdptkzuzxicnm.js"></script>
<?php endif; ?>
<script src="https://kit.fontawesome.com/339539da33.js" crossorigin="anonymous"></script>
