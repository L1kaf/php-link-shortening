<header>
    <div class="container middle">
        <div class="logo">
            <img src="/public/img/logo.jpg" alt="Logo">
            <span>Уберем все лишнее из ссылке!</span>
        </div>
        <div class="menu">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/contact/about">Про нас</a></li>
                <li><a href="/contact/index">Контакты</a></li>
                <?php if($_COOKIE['login'] == ''): ?>
                    <li><a href="/user/auth">Войти</a></li>
                <?php else: ?>
                    <li><a href="/user">Кабинет пользователя</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>