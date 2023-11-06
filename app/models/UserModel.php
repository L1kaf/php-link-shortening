<?php
    //Подключение в БД
    require "DB.php";


    class UserModel {
        //Присвоение имен от полученых форм страницы регистрации
        private $login;
        private $email;
        private $pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        // Присвоение имен переменным
        public function setData($login, $email, $pass) {
            $this->login = $login;
            $this->email = $email;
            $this->pass = $pass;
        }
        // Проверка значений
        public function validForm() {
            //Подключение запроса на проверку наличия логина
            $query = $this->_db->prepare("SELECT * FROM users WHERE login=:login");
            $query->bindParam("login", $this->login, PDO::PARAM_STR);
            $query->execute();
            if(strlen($this->login) < 3)
                return "Логин слишком короткий";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else if ($query->rowCount() > 0) {
                return "Пользователь с таким логином уже существует";
            }
            else
                return "Верно";

        }
        //Добавление пользователя в БД
        public function addUser() {

                //Подготавливаем запрос в БД
                $sql = 'INSERT INTO users(login, email, pass) VALUES(:login, :email, :pass)';
                $query = $this->_db->prepare($sql);
                //Хешируем пароль
                $pass = password_hash($this->pass, PASSWORD_DEFAULT);

                $query->execute(['login' => $this->login, 'email' => $this->email, 'pass' => $pass]);
                //Добавляем куки и релокейт
                $this->setAuth($this->login);

        }
        //Использования данных о пользователи
        public function getUser() {
            $login = $_COOKIE['login'];
            $result =  $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //Выход пользователя
        public function logOut() {
            setcookie('login', $this->login, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }
        //Авторизация пользователя
        public function auth($login, $pass) {
            //Вытаскиваем логинины из БД
            $result =  $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
            $user = $result->fetch(PDO::FETCH_ASSOC);
            //Проверка на наличия логина и совпадение с паролем
            if($user['login'] == '')
                return 'Пользователя с таким логином не существет';
            else if(password_verify($pass, $user['pass'])) {
                $this->setAuth($login);
            }

            else
                return 'Пароли не совпадают';
        }
        //Добавлением куки и релокейт
        public function setAuth($login) {
            setcookie('login', $login, time() + 3600, '/');
            header('Location: /user');
        }
    }