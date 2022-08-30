<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/sidebar') ?>
    <?= $this->include('components/topbar') ?>
</header>

<main id="content">
    <div class="mb-5">
        <?= $this->include('components/breadcrumb') ?>
    </div>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 p-3 rounded-0 rounded-top">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-xl"></i></span>
                <span class="float-end">##</span>
            </div>
            <a href="<?= base_url() ?>/" class="btn btn-primary w-100 rounded-0 rounded-bottom">
                <span class="float-start">Title</span>
                <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span>
            </a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 p-3 rounded-0 rounded-top">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-xl"></i></span>
                <span class="float-end">##</span>
            </div>
            <a href="<?= base_url() ?>/" class="btn btn-primary w-100 rounded-0 rounded-bottom">
                <span class="float-start">Title</span>
                <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span>
            </a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 p-3 rounded-0 rounded-top">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-xl"></i></span>
                <span class="float-end">##</span>
            </div>
            <a href="<?= base_url() ?>/" class="btn btn-primary w-100 rounded-0 rounded-bottom">
                <span class="float-start">Title</span>
                <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span>
            </a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 p-3 rounded-0 rounded-top">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-xl"></i></span>
                <span class="float-end">##</span>
            </div>
            <a href="<?= base_url() ?>/" class="btn btn-primary w-100 rounded-0 rounded-bottom">
                <span class="float-start">Title</span>
                <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span>
            </a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 p-3 rounded-0 rounded-top">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-xl"></i></span>
                <span class="float-end">##</span>
            </div>
            <a href="<?= base_url() ?>/" class="btn btn-primary w-100 rounded-0 rounded-bottom">
                <span class="float-start">Title</span>
                <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span>
            </a>
        </div>
    </div>
</main>

<?= $this->endSection() ?>