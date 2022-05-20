<?php
/* 
	file:         test.template.php
	type:         Template
	written by:   Aaron Bishop
	description:  
        HTML for test module
*/

include("header.tpl.php") ?>

<?php if ($input_required_error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>Required fields missing:</b>
        <br /><br />
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php foreach ($input_required_failures as $field): ?>
            <?= $field ?><br />
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php if($input_validation_error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>Input validation error:</b>
        <br /><br />
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php foreach ($input_validation_failures as $field): ?>
            <?= $field ?><br />
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="container">
    <h3>Type some stuff</h3>

    <form class="row g-3" action="?id=<?= $id ?>" method="POST">
        <div class="col-md-4">
        <label class="form-label">Text:</label>
        <input type="text" name="text" class="form-control" value="<?= $text ?>">
        </div>

        <div class="col-md-4">
        <label class="form-label">Email:</label>
        <input type="text" name="email" class="form-control" value="<?= $email ?>">
        </div>

        <div class="col-12">
        <input type="checkbox" name="bool_option" class="form-check-input" <?php if ($bool_option) echo "checked"; ?>>
        <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
        </label>
        </div>

        <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</div>

<hr>

<div class="container">
    <h3>Inputs received</h3>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">field</th>
            <th scope="col">value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inputs as $input_name => $input_value): ?>
            <tr>
                <td><?= $input_name ?></td>
                <td><?= $input_value ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<!--
<br />
ALL INPUTS:<br />
<pre>
<?php var_dump( $all_inputs ) ?>
</pre>
            -->

<?php include("footer.tpl.php") ?>