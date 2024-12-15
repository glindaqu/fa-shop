<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/cart/index.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="title_row">
                <img src="/static/svg/cart.svg" alt="" class="cart_img">
                <div class="title_row__text">Ваш заказ</div>
            </div>
            <div class="content_wrapper">
                <div class="content">
                    <?php foreach ($items as $item) { ?>
                        <div class="content_item">
                            <div class="image_wrapper">
                                <img src="/static/img/items/<?= $item['image'] ?>" alt="" class="content_item__image">
                            </div>
                            <div class="content_item__text_section">
                                <div class="content_item__title"><?= $item['title'] ?></div>
                                <div class="content_item__article">Артикул: <?= $item['article'] ?></div>
                                <div class="content_item__price">
                                    <div class="content_item__price_current">
                                        <?= round($item['price'] * (1 - $item['discount'] / 100)) ?>₽
                                    </div>
                                    <div class="content_item__price_old"><?= $item['price'] ?>₽</div>
                                </div>
                            </div>
                            <div class="counter">
                                <div id="more<?= $item['id'] ?>" class="plus" readonly>+</div>
                                <div id="count<?= $item['id'] ?>" class="count"><?= $item['ordered_count'] ?></div>
                                <div id="less<?= $item['id'] ?>" class="minus" readonly>-</div>
                            </div>
                            <div class="content_item__price_block">
                                <div class="content_item__price_block__price">
                                    <?= round($item['price'] * (1 - $item['discount'] / 100)) ?>₽
                                </div>
                                <div class="content_item__price_block__count"><?= $item['ordered_count'] ?>шт.</div>
                            </div>
                            <form action="/cart/delete" method="post">
                                <input type="hidden" value="<?= $item['id'] ?>" name="item_id">
                                <button class="delete">X</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

    let maxCount = <?= $item['count'] ?>;
    let itemsCount = <?= count($items) ?>;

    for (let i = 1; i <= itemsCount; i++) {
        let counter = document.getElementById(`count${i}`);

        document.getElementById(`less${i}`).addEventListener('click', () => {
            if (counter.innerText > 1) {
                counter.innerText--;
            }
        });

        document.getElementById(`more${i}`).addEventListener('click', () => {
            if (counter.innerText < maxCount) {
                counter.innerText++;
            }
        });
    }
</script>

</html>