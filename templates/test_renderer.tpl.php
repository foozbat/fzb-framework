<?php include("header.tpl.php") ?>

<?php 
  $bm = new Fzb\Benchmark('rendering'); 
  $bm->start();
?>

<div class="card mt-3">
  <div class="card-body">
    <h5>Strings with unsafe content</h5>
    safe: <?= $unsafe_content1 ?><br />
    unsafe: <?= $unsafe_content1->unsafe ?><br />

    safe: <?= $unsafe_content2 ?><br />
    unsafe: <?= $unsafe_content2->unsafe ?> <br />
  </div>
</div>

<div class="card mt-3">
  <div class="card-body">
    <h5>Array with safe strings</h5>
    <?php foreach ($array as $val): ?>
      safe: <?= $val ?><br />
      unsafe: <?= $val->unsafe ?><br />
    <?php endforeach; ?>

    <h5 class="mt-3">Array with unsafe strings</h5>
    <?php foreach ($unsafe_arr as $val): ?>
        safe: <?= $val ?><br />
        unsafe: <?= $val->unsafe ?><br />
    <?php endforeach; ?>    
  </div>
</div>

<div class="card mt-3">
  <div class="card-body">
    <h5>2D Arrays</h5>
    <?php foreach ($unsafe_2d_array as $row): ?>
        <?php foreach ($row as $col): ?>
            safe: <?= $col ?><br />
            unsafe: <?= $col->unsafe ?><br />
        <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>

<div class="card mt-3">
  <div class="card-body">
    <?php 
      $bm->end();
      $bm->show();
    ?>
  </div>
</div>

<?php include("footer.tpl.php") ?>