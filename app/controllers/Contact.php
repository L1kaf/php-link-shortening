<?php
    class Contact extends Controller {
        public function index() {
            // Пустой массив для шаблона
            $data = [];
            //Провека отправки данных с форм
            if(isset($_POST['name'])) {
                //Подключение Контакт форм
                $mail = $this->model('ContactForm');
                // Установка значений из форм
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                // Проверка ошибок
                $isValid = $mail->validForm();
                if($isValid == "Верно")
                    $data['message'] = $mail->mail();
                else
                    $data['message'] = $isValid;
            }

            $this->view('contact/index', $data);
        }

        public function about() {
            $this->view('contact/about');
        }
    }