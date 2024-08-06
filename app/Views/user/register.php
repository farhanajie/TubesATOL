<?= $this->extend('_partials/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <?php
    $errors = session()->getFlashdata('errors');
    if($errors) :
    ?>
        <div class="alert alert-danger" role="alert">
            <ul>
            <?php foreach($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-body">
            <h3>Register</h3>
            <hr>
            <form action="<?= base_url('register/process') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pass-confirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="pass_confirm" id="pass-confirm" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Register</button>
                <br><br>
                Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>