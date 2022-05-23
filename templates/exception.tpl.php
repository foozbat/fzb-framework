<div class="alert alert-danger" role="alert">
<b>Fatal Exception</b>
<p>
<?= $exception_message ?>
<p>
<?= $exception_file ?>: Line <?= $exception_line ?>
<p>
<pre><?= $exception_trace ?></pre>
</div>