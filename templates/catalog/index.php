<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/catalog/index.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="slider">
                <div class="slider-wrapper">
                    <div class="inner">
                        <div class="card">
                            <img src="/static/img/slider_content/1.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/2.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/3.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/1.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/2.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/3.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/1.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/2.png">
                        </div>
                        <div class="card">
                            <img src="/static/img/slider_content/3.png">
                        </div>
                    </div>
                </div>

                <div class="map">
                    <button class="active first"></button>
                    <button class="second"></button>
                    <button class="third"></button>
                </div>
            </div>
            <div class="title">Каталог</div>
            <div class="catalog-grid">
                <?php foreach ($items as $item) { ?>
                    <a href="/catalog/item/id=<?= $item['id'] ?>" class="catalog-item">
                        <img class="catalog_item__image" src="/static/img/items/<?= $item['image'] ?>"></img>
                        <div class="catalog_item__text">
                            <div class="catalog_item__text__title"> <?= $item['title'] ?> </div>
                            <div class="catalog_item__text__price">
                                <div class="catalog_item__text__current_price">
                                    <?= round($item['price'] * (1 - $item['discount'] / 100)) ?>₽
                                </div>
                                <div class="catalog_item__text__old_price"> <?= $item['price'] ?>₽ </div>
                            </div>
                            <div class="catalog_item__count">осталось <?= $item['count'] ?> шт.</div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

<script>
    const buttonsWrapper = document.querySelector(".map");
    const slides = document.querySelector(".inner");

    buttonsWrapper.addEventListener("click", e => {
        if (e.target.nodeName === "BUTTON") {
            Array.from(buttonsWrapper.children).forEach(item =>
                item.classList.remove("active")
            );
            if (e.target.classList.contains("first")) {
                slides.style.transform = "translateX(-0%)";
                e.target.classList.add("active");
            } else if (e.target.classList.contains("second")) {
                slides.style.transform = "translateX(-33.33333333333333%)";
                e.target.classList.add("active");
            } else if (e.target.classList.contains('third')) {
                slides.style.transform = 'translatex(-66.6666666667%)';
                e.target.classList.add('active');
            }
        }
    });
</script>

</html>