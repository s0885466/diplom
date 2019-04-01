<?php

class UserController
{

    public function actionRegister($str1, $str2)
    {

        $name = '';
        $email = '';
        $password ='';

        if (isset($_POST['submit'])){
            $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
            $errors = false;
            $result = false;

            //Проверки на правильность написания
            if(!CheckModel::isName($name)) {
            $errors[] = "Имя должно быть длинее 4 символов";
            }
            if(!CheckModel::isEmail($email)) {
            $errors[] = "Не корректная почта";
            }
            if(!CheckModel::isPassword($password)) {
            $errors[] = "Пароль должен быть длинее 5 символов";
            }
            if(CheckModel::isEmailExist($email)) {
                $errors[] = "Пользователь $email уже зарегистрирован";
            }

            //если ошибок нет, то регистрируем нового пользователя
            if($errors == false) {
                $result = UserModel::register($name,$email,$password);

                $message = "Здравствуйте $name, вы успешно прошли
                регистрацию на сайте ИТМО.\n Ваши данные для авторизации:\n
                логин - $email \n
                пароль - $password
                ";

                mail($email, 'регистрация на сайте ИТМО',$message);
            }
        }

        //данные для сайдбара
        $dataSidebar = UserModel::getSidebar();
        $dataSpecification = UserModel::getSpecification(); //получаем от родителя
        //Подключаем Views в зависимости от запроса
        require_once (ROOT."/views/{$str2}/page.php");

        return true;
    }


    public function actionLogin($str1, $str2)
    {
        $email = '';
        $password ='';

        if (isset($_POST['submit'])){
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
            $errors = false;

            //Проверки на правильность написания

            if(!CheckModel::isEmail($email)) {
                $errors[] = "Не корректная почта";
            }
            if(!CheckModel::isPassword($password)) {
                $errors[] = "Пароль должен быть длинее 5 символов";
            }
            //проверим существует ли пользователь
            $userId = UserModel::isUserDataExist($email,$password);

            if (!$userId) {
                $errors[] = "Неверные данные для входа на сайт";

            } elseif (UserModel::isPermission($userId)){
                UserModel::auth($userId, $email);
                //перенаправляем на страничку суперпользователя
                header("Location: /private/admin");
            }

            else {
                UserModel::auth($userId, $email);
                header("Location: /private/cabinet");
            }

        }

        $dataSidebar = UserModel::getSidebar();
        $dataSpecification = UserModel::getSpecification(); //получаем от родителя
        //Подключаем Views в зависимости от запроса
            require_once (ROOT."/views/{$str2}/page.php");

        return true;

    }

    public function actionLogout($str1, $str2){
        session_unset();
        header('location:/');
    }
}