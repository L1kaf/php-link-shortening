<?php
    //Подключение в БД
    require "DB.php";

    class ReductionModel {
        //Присвоение имен от полученых форм страницы для скоращения ссылок
        private $full;
        private $small;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        // Присвоение имен переменным
        public function setData2($full, $small) {
            $this->full = $full;
            $this->small = $small;
        }
        // Проверка значений
        public function validForm2() {
            //Подключение запроса на проверку наличия короткой ссылки
            $query = $this->_db->prepare("SELECT * FROM reduction WHERE small=:small");
            $query->bindParam("small", $this->small, PDO::PARAM_STR);
            $query->execute();
            if(strlen($this->full) < 3)
                return "Ваша ссылка слишком короткая";
            else if ($query->rowCount() > 0) {
                return "Такое сокращение уже используется в базе";
            }
            else
                return "Верно";

        }
        //Добавление пользователя в БД
        public function addString() {
            //Подготавливаем запрос в БД
            $sql = 'INSERT INTO reduction(full, small) VALUES(:full, :small)';
            $query = $this->_db->prepare($sql);
            $query->execute(['full' => $this->full, 'small' => $this->small]);
        }

        public function getString() {
            $result = $this->_db->query("SELECT * FROM `reduction`");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delString($id) {
            $sth = $this->_db->prepare('DELETE FROM users WHERE id = :id');
            $sth->execute(array(
                ':id' => $id
            ));
        }
    }