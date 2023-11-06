<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Про нас" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/user.css" type="text/css" charset="utf-8">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container">
    <h1>Кабинет пользователя</h1>
    <div class="user-info">
        <p>Привет, <b><?=$data['login']?>!</b></p>
        <form action="/user" method="post">
            <input type="hidden" name="exit_btn">
            <button type="submit" class="btn">Выйти</button>
        </form>
    </div>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>