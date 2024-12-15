<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/auth/registration.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <form action="/authorize/login" method="post">
                <img src="/static/svg/user.svg" alt="" class="user_placeholder">
                <label>
                    <div class="text">Адрес эл. почты</div>
                    <input type="email" class="email" name="email">
                </label>
                <label>
                    <div class="text">Пароль</div>
                    <input type="password" class="password" name="password">
                </label>
                <input type="submit" class="submit_form" value="Продолжить">
                <a href="/authorize/register">Создать акканут</a>
            </form>
        </div>
    </div>
</body>

</html>