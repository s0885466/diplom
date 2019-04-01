<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 05.02.2019
 * Time: 11:01
 */

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        //получение параметров подключения из заранее сделанного файла, через массив
        $params = include ($paramsPath);
        $pdo = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}",
            $params['reg'],$params['password']);
        $pdo->exec("set names utf8");
        return $pdo;
    }
}