<?php include "templates/function.php"; ?>
<!DOCTYPE html>
<html lang="ja">
  <head><?php include 'tags/headTag.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php if(is_search()) : ?>
    [検索結果]看護師求人転職サイト最新情報
    <?php else : ?>
    看護師求人転職サイト最新情報
    <?php endif; ?>
    </title><?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?<?php echo time(); ?>"><!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/339539da33.js" crossorigin="anonymous"></script><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  </head>
  <body>
     <?php include 'tags/bodyTag.php'; ?>
    <div id="container">
      <header id="header">
        <nav><a href="<?php echo home_url('/'); ?>"><?php if(!is_mobile()) : ?><img src="<?php bloginfo('template_url'); ?>/images/top/logo--pc.svg" alt="" width="600px"><?php else : ?><img src="<?php bloginfo('template_url'); ?>/images/top/logo--pc.png" alt=""><?php endif; ?></a></nav>
      <?php if(is_front_page() || is_page('baito') || is_page('todo')) : ?>
      <?php if(!is_mobile()) : ?>
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/top/fv--pc.webp"><img src="<?php bloginfo('template_url'); ?>/top/fv--pc.png" alt="看護師転職サイトランキング">
        </picture><?php else : ?>
        <picture>
          <source type="image/webp" srcset="<?php bloginfo('template_url'); ?>/images/top/fv--sp.webp"><img src="<?php bloginfo('template_url'); ?>/top/fv--sp.png" alt="看護師転職サイトランキング">
        </picture><?php endif; ?>
      <?php endif; ?>
      </header>
    </div>