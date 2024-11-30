<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/auth/registration.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <form action="/fa-shop-app/authorize/register" method="post">
                <img src="/static/svg/user.svg" alt="" class="user_placeholder">
                <label>
                    <div class="text">Имя акканута</div>
                    <input type="text" class="account_name" name="account_name">
                </label>
                <label>
                    <div class="text">Адрес эл. почты</div>
                    <input type="email" class="email" name="email">
                </label>
                <label>
                    <div class="text">Пароль</div>
                    <input type="password" class="password" name="password">
                </label>
                <label>
                    <div class="text">Подтвердите пароль</div>
                    <input type="password" class="password" name="password_again">
                </label>
                <input type="submit" class="submit_form" value="Продолжить">
            </form>
        </div>
    </div>
</body>

</html>