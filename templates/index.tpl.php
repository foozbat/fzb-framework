<?php include("header.tpl.php") ?>

<h3>Controllers:</h3>

<div class="list-group">
<?php foreach ($controllers as $path): ?>
    <a href="<?= $_base_path ?><?= $path ?>" class="list-group-item list-group-item-action"><?= $path ?></a>
<?php endforeach; ?>
</div>

<?php include("footer.tpl.php") ?>