<?php include("header.tpl.php") ?>

<?php function my_function($var) { ?>
    Main Page
<?php } ?>

<div class="list-group">
<?php foreach ($controllers as $path): ?>
    <a href="<?= $path ?>" class="list-group-item list-group-item-action"><?= $path ?></a>
<?php endforeach; ?>
</div>

<?php my_function(1) ?>

<?php include("footer.tpl.php") ?>