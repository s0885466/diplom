<?php

class FormController
{

    public function actionSend($str1, $str2)
    {
        $name = $_POST['send_name'];
        $email = $_POST['send_email'];
        $message = $_POST['text_message'];

        $error = [];

        if(!CheckModel::isName($name)) {
            $error['send_name'] = "Имя должно быть длиннее 4 символов";
        }
        if(!CheckModel::isEmail($email)) {
            $error['send_email'] = "Неверно указан Email";
        }
        if(!CheckModel::isMessage($message)) {
            $error['text_message'] = "сообщение должно быть длиннее 10 символов";
        }

        if(CheckModel::isDoubleClick(5)){
            $error['time'] = "интервал между нажатиями должен быть не меньше 5 секунд";
        }



        if (empty($error)){

            $emailAdmin = '0885466@gmail.com';
            $subject = "сообщение с сайта ITMO";
            $message = "{$message} от ${$name}";
            //отправляем писмьмо и возвращаем true
            mail($emailAdmin, $subject, $message);
            echo true;

        } else {
            //отправляем ассоциативный массив с ошибками
            echo(json_encode($error,JSON_UNESCAPED_UNICODE));
        }
    }    
}