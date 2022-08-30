<?php function isPageActive($page, $cur_page)
{
    return ($page === $cur_page) ? 'active' : '';
} ?>

<nav id="sidebar">
    <div id="sidebarBrand" class="container navbar">
        <a class="navbar-brand text-white fw-bold" href="#">LHS AIMS</a>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?= isPageActive($page, 'dashboard') ?>" aria-current="page" href="<?= base_url() ?>/dashboard"><i class="fas fa-fw fa-gauge"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= isPageActive($page, 'users') ?>" href="<?= base_url() ?>/users"><i class="fas fa-fw fa-users"></i> Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= isPageActive($page, 'announcements') ?>" href="<?= base_url() ?>/announcements"><i class="fas fa-fw fa-bullhorn"></i> Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= isPageActive($page, 'forum') ?>" href="<?= base_url() ?>/forum"><i class="fas fa-fw fa-comments"></i> Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>/logout"><i class="fas fa-fw fa-right-from-bracket"></i> Logout</a>
        </li>
    </ul>
</nav>