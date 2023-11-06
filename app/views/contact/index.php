<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свяжитесь с нами</title>
    <meta name="description" content="Свяжитесь с нами" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css?url=<?=mt_rand(0,100)?>" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css?url=<?=mt_rand(0,100000)?>" type="text/css" charset="utf-8">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Обратная связь</h1>
        <p>Напишите нам, если у вас есть вопросы</p>
        <form action="/contact" method="post" class="form-controll">
            <input type="text" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>"><br>
            <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
            <input type="text" name="age" placeholder="Введите возраст" value="<?=$_POST['age']?>"><br>
            <textarea name="message" placeholder="Введите само сообщение" value="<?=$_POST['message']?>"></textarea><br>
            <div class="error"><?=$data['message']?></div>
            <button class="btn" id="send">Отправить</button>
        </form>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>