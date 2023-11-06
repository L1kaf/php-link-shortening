<?php
    class Home extends Controller {
        public function index() {
            // Пустой массив для шаблона
            $data = [];
            //Провека отправки данных с форм
            if(isset($_POST['login'])) {
                //Подключение модели регистрации
                $user = $this->model('UserModel');
                // Установка значений из форм
                $user->setData($_POST['login'], $_POST['email'], $_POST['pass']);

                // Проверка ошибок
                $isValid = $user->validForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            if(isset($_POST['full'])) {
                $string = $this->model('ReductionModel');
                // Установка значений из форм
                $string->setData2($_POST['full'], $_POST['small']);

                // Проверка ошибок
                $isValid2 = $string->validForm2();
                if ($isValid2 == "Верно")
                    $string->addString();
                else
                    $data['message'] = $isValid2;
            }
            $string = $this->model('ReductionModel');

            $this->view('home/index', $data, $string->getString());
        }


        public function delete($id) {
            $this->model->delete($id);
            header('Location: /');
        }
    }