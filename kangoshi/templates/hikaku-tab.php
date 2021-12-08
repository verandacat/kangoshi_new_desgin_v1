

<div id="tab__container">
  <ul id="tab__list">
    <li class="tab-button active" data-id="0">総合</li>
    <li class="tab-button" data-id="1">取扱求人</li>
    <li class="tab-button" data-id="2">サービス内容</li>
  </ul>

  <div class="tab-content show">
    <?php include "hikaku.php"; ?>
  </div>

  <div class="tab-content">
    <?php include "hikaku-kyu.php"; ?>
  </div>

  <div class="tab-content">
    <?php include "hikaku-ser.php"; ?>
  </div>
</div>
