  <!-- Info boxes -->
  <div class="container">
    <div class="row">

      <div class="row">
        <?php foreach ($infobox as $key => $info) : ?>
          <div class="col">
            <div class="info-box">
              <span class="info-box-icon <?= $info['bg'] ?> elevation-1"><i class="<?= $info['icon'] ?>"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><?= $info['caption'] ?></span>
                <a href="<?= $info['url'] ?>"><span class="info-box-number"><?= $key * 10 ?></span></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>