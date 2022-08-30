<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<main id="loginContainer" class="row">
    <div class="col d-flex justify-content-center">
        <?= form_open('login', ['class' => 'rounded rounded-3 row row-cols-1 text-white', 'id' => 'loginForm']) ?>
            <div class="col mb-3 text-center"><h1>LOGIN</h1></div>
            <div class="col mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username...">
                <?= isset($validation) ? $validation->showError('username', 'single') : null ?>
            </div>
            <div class="col mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password...">
                <?= isset($validation) ? $validation->showError('password', 'single') : null ?>
            </div>
            <div class="col d-flex justify-content-center"><input type="submit" value="Login" class="w-50 btn btn-danger"></div>
        <?= form_close() ?>
    </div>

    <div class="col d-flex align-items-center align-items-md-start d-none d-lg-flex flex-column text-light">
        <img src="<?= base_url() ?>/logo.png" id="loginBrand" alt="">
        <h2 class="fs-1 border-start border-5 ps-3">Lagonoy High School Alumni Information & Management System</h2>
        <p class="ps-4"><strong>Hi!</strong> Welcome to the LHS Alumni Information & Management System where we provide quality service to our alumni. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio unde praesentium eum hic. Libero voluptate quasi beatae accusamus molestiae saepe sapiente aspernatur corrupti eveniet dolor? Aliquid quo quasi nesciunt similique.</p>
    </div>
</main>

<?= $this->endSection() ?>