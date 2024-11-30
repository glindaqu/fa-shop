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
                        <img class="item_info__image_main" src="/static/img/slider_content/1.png">
                        <div class="item_info__image_switcher">
                            <img src="/static/img/slider_content/1.png" alt="" class="item_info__image_switcher_item">
                            <img src="/static/img/slider_content/1.png" alt="" class="item_info__image_switcher_item">
                            <img src="/static/img/slider_content/1.png" alt="" class="item_info__image_switcher_item">
                        </div>
                    </div>
                    <div class="item_info__text_block">
                        <div class="item_info__text_block__title">Набор из 7 кубиков для DnD</div>
                        <div class="item_info__text_block__article">Артикул: METAL-DICE</div>
                        <div class="item_info__text_block__rate">★5.0</div>
                        <div class="item_info__text_block__price">
                            <div class="item_info__text_block__price_new">960 р.</div>
                            <div class="item_info__text_block__price_old">1 199 р.</div>
                        </div>
                        <form action="" class="add_to_cart">
                            <div class="counter">
                                <button class="less">-</button>
                                <div class="count">1</div>
                                <button class="more">+</button>
                            </div>
                            <input type="submit" value="В корзину" class="submit">
                        </form>
                        <div class="item_info__text_block__description">Набор дайсов для различных настольных ролевых игр</div>
                        <div class="item_info__text_block__material">Материал: 100% сталь</div>
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
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
                        <div class="item_feedbacks_item">
                            <div class="item_feedbacks_item_container">
                                <div class="item_feedbacks_item__row">
                                    <div class="item_feedbacks_item__customer">Вадим</div>
                                    <div class="item_feedbacks_item__mark">★★★★★</div>
                                </div>
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
                        <div class="item_feedbacks_item">
                            <div class="item_feedbacks_item_container">
                                <div class="item_feedbacks_item__row">
                                    <div class="item_feedbacks_item__customer">Вадим</div>
                                    <div class="item_feedbacks_item__mark">★★★★★</div>
                                </div>
                                <div class="item_feedbacks_item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam totam fugit quam omnis accusantium esse, ut odit, non laudantium ullam, nam nesciunt? Vitae magnam cupiditate laboriosam, illum debitis qui id!</div>
                            </div>
                            <div class="item_feedbacks_item__date">26.01.22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>