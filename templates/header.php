<link rel="stylesheet" href="/fa-shop-app/static/css/style.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/core/controllers/AuthorizeController.php'; ?>

<header>
    <div class="header_logo">
        <img src="/static/svg/logo.svg" alt="">
    </div>
    <?php if (AuthorizeController::has_auth()) { ?>
        <a href="/authorize/logout">Выйти</a>
    <?php } ?>
</header>