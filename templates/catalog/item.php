<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товар</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/catalog/item.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="item_container">
                <div class="item_info">
                    <div class="item_info__image_block">
                        <img id="main_image" class="item_info__image_main"
                            src="/static/img/slider_content/<?= $item['image'] ?>">
                        <div class="item_info__image_switcher">
                            <img src="/static/img/slider_content/1.png" alt="" class="item_info__image_switcher_item">
                        </div>
                    </div>
                    <div class="item_info__text_block">
                        <div class="item_info__text_block__title"> <?= $item['title'] ?> </div>
                        <div class="item_info__text_block__article">Артикул: <?= $item['article'] ?></div>
                        <div class="item_info__text_block__rate">★<?= $rate ?></div>
                        <div class="item_info__text_block__price">
                            <div class="item_info__text_block__price_new">
                                <?= round($item['price'] * (1 - $item['discount'] / 100)) ?>₽
                            </div>
                            <div class="item_info__text_block__price_old"><?= $item['price'] ?>₽</div>
                        </div>
                        <form action="/catalog/add_to_cart" class="add_to_cart" method="post">
                            <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                            <div class="counter">
                                <button id="less" type="button" class="less">-</button>
                                <input id="count" name="count" class="count" value="1" readonly />
                                <button id="more" type="button" class="more">+</button>
                            </div>
                            <input type="submit" value="В корзину" class="submit">
                        </form>
                        <div class="item_info__text_block__description"><?= $item['description'] ?></div>
                        <div class="item_info__text_block__material">Материал: <?= $item['material'] ?></div>
                    </div>
                </div>
                <div class="add_feedback">
                    <div class="add_feedback__title">Добавить отзыв</div>
                    <form action="/catalog/add_feedback" class="add_feedback__form" method="post">
                        <input type="text" name="text" class="add_feedback__feedback" placeholder="Опишите товар">
                        <input type="submit" class="add_feedback__submit">
                        <input type="hidden" name="rate" value="" id="rate">
                        <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                    </form>
                    <div class="add_feedback__rate">
                        <div class="add_feedback__rate_item">★</div>
                        <div class="add_feedback__rate_item">★</div>
                        <div class="add_feedback__rate_item">★</div>
                        <div class="add_feedback__rate_item">★</div>
                        <div class="add_feedback__rate_item">★</div>
                    </div>
                </div>
                <div class="item_feedbacks">
                    <div class="item_feedbacks__title">Отзывы</div>
                    <div class="item_feedbacks_grid">
                        <?php if ($feedback) { ?>
                            <?php foreach ($feedback as $f) { ?>
                                <div class="item_feedbacks_item">
                                    <div class="item_feedbacks_item_container">
                                        <div class="item_feedbacks_item__row">
                                            <div class="item_feedbacks_item__customer"><?= $f['username'] ?></div>
                                            <div class="item_feedbacks_item__mark">
                                                <?php
                                                for ($i = 0; $i < $f['rate']; $i++) {
                                                    echo '★';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="item_feedbacks_item__text"><?= $f['content'] ?></div>
                                    </div>
                                    <div class="item_feedbacks_item__date">
                                        <?= DateTime::createFromFormat('Y-m-d H:i:s', $f['date'])->format('d.m.Y') ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

    let mainImage = document.getElementById('main_image');
    let maxCount = <?= $item['count'] ?>;
    let counter = document.getElementById('count');

    document.querySelectorAll('.item_info__image_switcher_item').forEach(item => {
        item.addEventListener('click', () => {
            let newSrc = item.src;
            item.src = mainImage.src;
            mainImage.src = newSrc;
        });
    });

    document.getElementById('less').addEventListener('click', () => {
        if (counter.value > 1) {
            counter.value--;
        }
    });

    document.getElementById('more').addEventListener('click', () => {
        if (counter.value < maxCount) {
            counter.value++;
        }
    });

    let stars = document.querySelectorAll('.add_feedback__rate_item');
    let rate = document.getElementById('rate');

    stars.forEach(el => {
        el.addEventListener('click', () => {
            for (let i = 0; i < stars.length; i++) {
                stars[i].classList.remove('clicked');
            }
            for (let i = 0; i < stars.length; i++) {
                stars[i].classList.add('clicked');
                if (el == stars[i]) {
                    rate.value = i + 1;
                    break;
                }
            }
        });
    });

</script>

</html>