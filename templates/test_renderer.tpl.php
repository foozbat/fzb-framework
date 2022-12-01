<html>
  <head>

  </head>

  <body>

    <?php 
      $bm = new Fzb\Benchmark('rendering'); 
      $bm->start();
    ?>

    <?php foreach ($array as $val): ?>
        <?= $val ?><br />
    <?php endforeach; ?>

    <br />

    safe: <?= $unsafe_content1 ?><br />
    unsafe: <?= $unsafe_content2->unsafe ?>
    
    <br />
    <br />

    safe:<br />
    <?php foreach ($unsafe_2d_array as $row): ?>
        <?php foreach ($row as $col): ?>
            <?= $col ?>
        <?php endforeach; ?><br />
    <?php endforeach; ?>

    <br />

    unsafe by element:<br />
    <?php foreach ($unsafe_2d_array as $row): ?>
        <?php foreach ($row as $col): ?>
            <?= $col->unsafe ?>
        <?php endforeach; ?><br />
    <?php endforeach; ?>
    <br />

    unsafe by row:<br />
    <?php foreach ($unsafe_2d_array->unsafe as $row): ?>
        <?php foreach ($row as $col): ?>
            <?= $col ?>
        <?php endforeach; ?><br />
    <?php endforeach; ?>

    <br />
    
    iterating a single value (shouldn't work, but don't want error): <br />
    <?php foreach ($iterate_me as $me): ?>
        <?= $me ?>
    <?php endforeach; ?>

    <?php 
      $bm->end();
      $bm->show();
    ?>

  </body>
</html>