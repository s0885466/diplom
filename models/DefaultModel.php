<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 07.02.2019
 * Time: 11:06
 */
//Подключаем родителя
if (is_file(ROOT . '/models/ParentModel.php')){
    include_once (ROOT . '/models/ParentModel.php');
}


class DefaultModel extends ParentModel //так назвали, потому что Default назвать не вышло)
{
    public static function getAllElements()
    {
        //TODO подключиться к базе данных и получить массив

        include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        //выбираем все элементы, вообще все
        $sql = "SELECT `tb_category`.*,`tb_type`.title AS title_type
        FROM `tb_category`, `tb_type`
        WHERE `tb_category`.type_id = `tb_type`.id
        ";

        $query = $pdo->prepare($sql);
        $query->execute();
        //выводим результат запроса в виде массива
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}