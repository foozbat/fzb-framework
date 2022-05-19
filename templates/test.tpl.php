<?php
/* 
	file:         test.template.php
	type:         Template
	written by:   Aaron Bishop
	description:  
        HTML for test module
*/

include("header.tpl.php") ?>

<?php if ($validation_error): ?>
    <?php if ($required_failures): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <b>Required fields missing:</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <pre><?php print_r($required_failures) ?></pre>
        </div>
    <?php endif ?>

    <?php if($validation_failures): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <b>Input validation error:</b>
            <pre><?php print_r($validation_failures) ?></pre>
        </div>
    <?php endif ?>
<?php endif ?>


INPUTS ACCESS BY INDEX:
<br /><br />
id: <?= $id ?><br />
email: <?= $email ?><br />
text: <?= $text ?><br />
bool_option: <?php var_dump($bool_option) ?><br />
optional_thing: <?= $optional_thing ?><br />
<br />
year: <?= $year ?><br />
month: <?= $month ?><br />
day: <?= $day ?><br />

<form action="?id=<?= $id ?>" method="POST">
Text: <input type="text" name="text"><br />
Email: <input type="text" name="email"><br />
Check: <input type="checkbox" name="bool_option" <?php /* $html->checkbox_checked($bool_option) */?>><br />
<input type="submit">
</form>
<br />
ALL DEFINED VARS:<br />
<pre>
<?php var_dump( get_defined_vars() ) ?>
</pre>

ALL DEFINED GLOBALS:<br />
<pre>
<?php var_dump( $_SERVER ) ?>
</pre>

<?php include("footer.tpl.php") ?>