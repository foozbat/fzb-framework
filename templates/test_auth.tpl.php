<?php include("header.tpl.php") ?>

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
    <h3>Login</h3>

    <form class="row g-3" method="POST" novalidate>
        <div class="col-md-4">
        <label for="username" class="form-label">Username:</label>
        <input id="username" type="text" name="username" class="form-control is-invalid" value="<?= $inputs['username'] ?>" required>
        <?php if ($input_required_error): ?>
            <?php if (in_array("username", $input_required_failures)): ?>
            <div id="usernameFeedback" class="invalid-feedback is-invalid">
            Please enter a username.
            </div>
            <?php endif ?>
        <?php endif ?>

        </div>

        <div class="col-md-4">
        <label class="form-label">Password:</label>
        <input type="password" name="password" class="form-control" value="" required>
        <?php if ($input_required_error): ?>
            <?php if (in_array('password', $input_required_failures)): ?>
            <div class="invalid-feedback">
            Please enter your password.
            </div>
            <?php endif ?>
        <?php endif ?>
        </div>

        <div class="col-12">
        <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
</div>

<?php include("footer.tpl.php") ?>