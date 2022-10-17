RENDERED OBJECTS
<p>
<?php foreach ($all as $item): ?>
    Name:  <?= $item->name ?><br />
    Location:  <?= $item->city ?>, <?= $item->state ?> <?= $item->zip ?><br />
    <br />
<?php endforeach ?>
