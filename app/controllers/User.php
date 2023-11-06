<?php
    class User extends Controller {
        public function index() {
            //Использование Модели пользователя для обработки куки
            $user = $this->model('UserModel');

            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit;
            }


            $this->view('user/index', $user->getUser());
        }

        public function auth() {
            $data = [];
            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['login'], $_POST['pass']);
            }
            $this->view('user/auth', $data);
        }

    }
