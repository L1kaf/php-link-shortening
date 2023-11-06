<?php
    // Добавление PHP Mailer через Composer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    class ContactForm {
        //Присвоение имен от полученых форм страницы контакты
        private $name;
        private $email;
        private $age;
        private $message;

        // Присвоение имен переменным
        public function setData($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }
        // Проверка значений
        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Вы ввели не возраст";
            else if(strlen($this->message) < 5)
                return "Сообщение слишком короткое";
            else
                return "Верно";
        }
        // Отправка сообщения через PHPMailer
        public function mail() {

            $mail = new PHPMailer(true);
            try {
                // Настройки сервера. Почта и пароль изменены для примера
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'examle@gmail.com';                     //SMTP username
                $mail->Password   = 'example_password';                     //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Отправитель и получатель
                $mail->setFrom('examle1@gmail.com', 'NoBuryka');
                $mail->addAddress('examle2@gmail.com', 'Pavel');




                //Контент отправления
                $mail->isHTML(true);                                  //Подключение HTML
                $mail->Subject = 'Сообщение с сайта';   // Тема
                $mail->Body    = 'Имя: ' . $this->name . '. Возраст: ' . $this->age . '. mail: ' . $this->email . '. Сообщение: ' . $this->message; //Текст письма

                //Отправка сообщения
                $mail->send();
                return 'Сообщение отправлено';
                // Ошибка
            } catch (Exception $e) {
                return "Сообщение не отправлено. Ошибка: {$mail->ErrorInfo}";
            }

        }

    }