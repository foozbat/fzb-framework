<?php if ($validation_error): ?>
    <?php if ($required_failures): ?>
<b>Required fields missing:</b>
<pre>
<?php print_r($required_failures) ?>
</pre>
    <?php endif; ?>

    <?php if($validation_failures): ?>
<b>Input validation error:</b>
<pre>
<?php print_r($validation_failures) ?>
</pre>
    <?php endif; ?>
<?php endif; ?>


INPUTS ACCESS BY INDEX:
<br /><br />
id: <?= $id ?><br />
email: <?= $email ?><br />
text: <?= $text ?><br />
bool_option: <?= $bool_option ?><br />
optional_thing: <?= $optional_thing ?><br />

<form action="/fzb-framework/test" method="POST">
    Text: <input type="text" name="text">
    Email: <input type="text" name="email">
    <input type="submit">
    </form>