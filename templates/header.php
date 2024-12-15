<link rel="stylesheet" href="/fa-shop-app/static/css/style.css">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/core/controllers/AuthorizeController.php'; ?>

<header>
    <a class="header_logo" href="/catalog">
        <img src="/static/svg/logo.svg" alt="">
    </a>
    <?php if (AuthorizeController::has_auth()) { ?>
        <div class="navigation">
            <a href="/catalog">Каталог</a>
            <a href="/cart">Корзина</a>
        </div>
        <a href="/authorize/logout">Выйти</a>
    <?php } ?>
</header>