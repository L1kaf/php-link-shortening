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
    <h1 class="sokra">Сокра.тим</h1>
    <?php if($_COOKIE['login'] == ''): ?>
        <p>Вам нужно сократить ссылку? Прежде чем это сделать</p>
        <p>зарегистрируйтесь на сайте</p>
        <form action="/" method="post" class="form-controll">
            <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
            <input type="login" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>"><br>
            <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Зарегистрироваться</button>
        </form>
        <br>
        <p>Есть аккаунт? Тогда вы можете <a href="/user/auth">Авторизоваться</a></p>
    <?php else: ?>
        <p>Вам нужно сократить ссылку? Сейчас мы это сделаем</p>
        <form action="/" method="post" class="form-controll">
            <input type="text" name="full" placeholder="Длинная ссылка" value="<?=$_POST['full']?>"><br>
            <input type="text" name="small" placeholder="Короткое название" value="<?=$_POST['small']?>"><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Уменьшить</button>
        </form>
        <h2>Сокращенные ссылки</h2>
        <?php for($i = 0; $i < count($string); $i++): ?>
        <div class="link">
            <p>Длинная: <a class="ling" href="<?=$string[$i]['full']?>"><?=$string[$i]['full']?></a></p>
            <p>Короткая: <a class="ling" href="<?=$string[$i]['full']?>">localhost:888/s/<?=$string[$i]['small']?></a></p>
            <form action="/" method="post">
                <input type="hidden" name="del_btn">
                <button type="submit" class="btn del">Удалить</button>
            </form>
        </div>
        <?php endfor; ?>
    <?php endif; ?>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>