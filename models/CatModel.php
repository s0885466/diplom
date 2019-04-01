<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 05.02.2019
 * Time: 14:59
 */
//Подключаем родителя
include_once (ROOT . '/models/ParentModel.php');


class CatModel extends ParentModel
{

    public static function getOneElement($link)
    {
        //TODO подключиться к базе данных и получить элемент по айди

        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_category` WHERE `link`=:link";
        $query = $pdo->prepare($sql);
        $query->execute(['link'=>$link]);
        //выводим результат запроса в виде массива
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getCurrentElement($cat_id)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_element` 
        WHERE `cat_id` = '$cat_id' ORDER BY `weight`";
        $query = $pdo->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }




    public static function getAllElements($str1,$str2)
    {
        //TODO подключиться к базе данных и получить массив
        $link="{$str1}/{$str2}";
        include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        //получим id элемента по его link из таблички tb_type
        $sql = "SELECT `id` FROM `tb_type` WHERE `link`= ?";
        $query = $pdo->prepare($sql);
        $query->execute([$link]);
        $arr = $query->fetchAll(PDO::FETCH_ASSOC);

        $id =$arr[0]['id'];

        $sql = "SELECT `tb_category`.*,`tb_type`.title AS title_type
        FROM `tb_category`, `tb_type`
        WHERE `tb_category`.type_id = `tb_type`.id AND `tb_category`.type_id = {$id[0]}
        ";

        $query = $pdo->prepare($sql);
        $query->execute();
        //выводим результат запроса в виде массива
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}