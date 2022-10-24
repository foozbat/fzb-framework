<?php include("header.tpl.php") ?>

<?php if ($input_required_error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>Required fields missing</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if($input_validation_error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <b>Input validation error</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="container">
    <h3>Type some stuff</h3>

    <form class="row g-3" action="?id=<?= $id ?>" method="POST">
        <div class="col-md-4">
        <label class="form-label">Text:</label>
        <input type="text" name="text" class="form-control <?php if (@$text_is_missing): ?>is-invalid<?php endif ?>" value="<?= $text ?>">

            <?php if (@$text_is_missing): ?>
                <div id="textFeedback" class="invalid-feedback is-invalid">
                Please enter some text.
                </div>
            <?php endif ?>
        </div>

        <div class="col-md-4">
            <label class="form-label">Email:</label>
            <input type="text" name="email" class="form-control <?php if ($email_is_missing || $email_is_invalid): ?>is-invalid<?php endif ?>" value="<?= $email_submitted_value ?>">
            <?php if ($email_is_missing): ?>
                <div class="invalid-feedback is-invalid">
                Please enter your email.
                </div>
            <?php endif ?>
            <?php if ($email_is_invalid): ?>
                <div class="invalid-feedback is-invalid">
                Please enter a valid email address.
                </div>
            <?php endif ?>
        </div>

        <div class="col-12">
            <input type="checkbox" name="bool_option" class="form-check-input <?php if ($bool_option_is_missing): ?>is-invalid<?php endif ?>" <?php if ($bool_option) echo "checked"; ?>>
            <label class="form-check-label <?php if ($bool_option_is_missing): ?>is-invalid<?php endif ?>" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <?php if ($bool_option_is_missing): ?>
                <div class="invalid-feedback is-invalid">
                You must agree to the terms and conditions... or else.
                </div>
            <?php endif ?>
        </div>

        <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</div>

<hr>

<div class="container">
    <h3>Page Input</h3>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">field</th>
            <th scope="col">value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($page_input as $input_name => $input_value): ?>
            <tr>
                <td><?= $input_name ?></td>
                <td><?= $input_value ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php if ($form_input): ?>
<div class="container">
    <h3>Form Input</h3>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">field</th>
            <th scope="col">value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($form_input as $input_name => $input_value): ?>
            <tr>
                <td><?= $input_name ?></td>
                <td><?= $input_value ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php endif ?>

<?php print $text ?>
<?php echo $text ?>
<?= $text ?>

<?php include("footer.tpl.php") ?>