<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 25.02.2019
 * Time: 20:22
 */

class CheckModel
{
    //проверка на двойной клик $time - интервал между нажатиями
    public static function isDoubleClick($time)
    {
        if(!isset($_SESSION['currentTime'])){
            $_SESSION['currentTime'] = time();
            return false;
        } elseif((time() - $_SESSION['currentTime']) < $time){
            $_SESSION['currentTime'] = time();
            return true;
        } else {
            $_SESSION['currentTime'] = time();
            return false;
        }
    }


    //проверка на положительное число
    public static function isNumber($param)
    {
        if (is_numeric($param)){
            return ($param > 0) ? true: false;
        }
        return false;
    }

    //проверка на число 0 или больше нуля
    public static function isId($param)
    {
        if (is_numeric($param)){
            return true;
        }
        return false;
    }

    //проверка на непустую строку
    public static function isStr($param)
    {
        return (iconv_strlen($param)>0) ? true: false;
    }

    //проверка корректности строки более 4х символов
    public static function isName($param)
    {
        return (strlen($param) > 4) ? true : false;
    }

    //проверка корректности email
    public static function isEmail($param)
    {
        return (filter_var($param, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

    //проверка корректности email
    public static function isPassword($password)
    {
        return (strlen($password) > 5) ? true : false;
    }

    //проверка корректности сообщения более 10 символов
    public static function isMessage($param)
    {
        return (strlen($param) > 10) ? true : false;
    }

    public static function isChoose($param)
    {
        return (($param) != 'Выбрать') ? true : false;
    }

    //проверка существует ли уже email
    public static function isEmailExist($email)
    {
        //TODO Подключиться к базе данных и проверить есть ли пользователь с таким именем
        include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        $sql = "SELECT COUNT(*) FROM `tb_users` WHERE `email`= :email";
        $query = $pdo->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        if($query->fetchColumn()){
            return true;
        }
        return false;
    }

}