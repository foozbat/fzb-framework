<?php include("header.tpl.php") ?>

<h2>Test Routes</h2>

<div class="list-group">
<?php foreach ($routes as $path => $properties): ?>
    <a href="/<?= $_base_path ?><?= $path ?>" class="list-group-item list-group-item-action"><?= implode(", ", $properties['method']); ?>: <?= $path ?></a>
<?php endforeach; ?>
</div>


<div class="card mt-5">
    <div class="card-body">
    <h3>Test Post:</h3>
        <form action="/<?= $_base_path ?>/test_router/rcvpost/100" method="POST">
            <button type="submit">click me</button>
        </form>
    </h3>
    </div>
</div>

<div class="card mt-5">
    <div class="card-body">
        <?php Fzb\Benchmark::show(); ?>
    </div>
</div>

<?php include("footer.tpl.php") ?>