<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <meta name="description" content="Регистрация" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css?url=<?=mt_rand(0,100)?>" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css?url=<?=mt_rand(0,100000)?>" type="text/css" charset="utf-8">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Авторизация</h1>
    <p>Здесь вы можете авторизоваться на сайте</p>
    <form action="/user/auth" method="post" class="form-controll">
        <input type="login" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>"><br>
        <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
        <div class="error"><?=$data['message']?></div>
        <button class="btn" id="send">Готово</button>
    </form>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>