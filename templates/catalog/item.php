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
                        <div class="item_info__text_block__rate">★5.0</div>
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
                                <input id="count" name="count" class="count" value="1" readonly/>
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
                    <form action="" class="add_feedback__form">
                        <input type="text" name="text" class="add_feedback__feedback" placeholder="Опишите товар">
                        <input type="submit" class="add_feedback__submit">
                    </form>
                </div>
                <div class="item_feedbacks">
                    <div class="item_feedbacks__title">Отзывы</div>
                    <div class="item_feedbacks_grid">
                        <div class="item_feedbacks_item">
                            <div class="item_feedbacks_item_container">
                                <div class="item_feedbacks_item__row">
                                    <div class="item_feedbacks_item__customer">Вадим</div>
                                    <div class="item_feedbacks_item__mark">★★★★★</div>
                                </div>
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non
                                    laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis
                                    qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
                        <div class="item_feedbacks_item">
                            <div class="item_feedbacks_item_container">
                                <div class="item_feedbacks_item__row">
                                    <div class="item_feedbacks_item__customer">Вадим</div>
                                    <div class="item_feedbacks_item__mark">★★★★★</div>
                                </div>
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non
                                    laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis
                                    qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
                        <div class="item_feedbacks_item">
                            <div class="item_feedbacks_item_container">
                                <div class="item_feedbacks_item__row">
                                    <div class="item_feedbacks_item__customer">Вадим</div>
                                    <div class="item_feedbacks_item__mark">★★★★★</div>
                                </div>
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non
                                    laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis
                                    qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
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

</script>

</html>