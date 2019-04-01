<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 07.02.2019
 * Time: 11:35
 */

class ParentModel
{
    public static function getSidebar()
    {
        //TODO подключиться к базе данных и получить массив

        $pdo = Db::getConnection();
        $sql = "SELECT `tb_category`.`id`, `tb_category`.title,`tb_category`.link ,`tb_type`.name AS name_type
        ,`tb_type`.link AS link_type
        FROM `tb_category`, `tb_type`
        WHERE `tb_category`.type_id = `tb_type`.id
        ORDER BY `tb_category`.type_id;
        ";

        $query = $pdo->prepare($sql);
        $query->execute();
        //выводим результат запроса в виде массива
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getSpecification(){
        $pdo = Db::getConnection();
        if(isset($_SESSION['user'])){
            $userId = $_SESSION['user']['userId'];
        } else return false;

        $sql = "SELECT *, ROUND(SUM(`amount`),1) AS `amount`, ROUND(SUM(`all_weight`),1) AS `all_weight` 
        FROM `tb_pivot` WHERE `user_id` = $userId GROUP BY `name` ORDER BY `name`;";
        $query = $pdo->prepare($sql);
        $query->execute();
        //выводим результат запроса в виде массива
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getSpecificationFromSession(){
        if (isset($_SESSION['dataSpec']) and count($_SESSION['dataSpec'])>0)
        return $_SESSION['dataSpec'];
    }


}