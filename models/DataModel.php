<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 11.02.2019
 * Time: 21:56
 */

class DataModel
{


    public static function isInt($num)
    {
        $num = filter_var($num, FILTER_SANITIZE_STRING);
        $num = (int)$num;
        if(is_int($num)){
            return ($num > 0)? true : false;
        }
        return false;
    }



    public static function sendDataInSession($id, $catId, $amount, $volume = null, $addName = null)
    {
        //заведем массив для хранения данных в сессии



        $pdo = Db::getConnection();

        //найдем другие данные
        $sql = "SELECT `tb_element`.`name`, `tb_element`.`weight`, 
                `tb_category`.`gost`, `tb_category`.`material`, `tb_element`.`note` FROM `tb_element`, `tb_category`
                 WHERE  `tb_category`.`id` =:catId and `tb_element`.`id` =:id;";

        $query = $pdo->prepare($sql);
        $query->execute(['id'=>$id, 'catId'=>$catId]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        //подготовим данные для добавления в pivot_table
        $catId = $catId;
        $elemId = $id;
        $gost = $result[0]['gost'];
        $name = $result[0]['name'];
        if (isset($addName)) $name .=" $addName";
        $amount = $amount;
        $material = $result[0]['material'];
        $weight = $result[0]['weight'];
        if (isset($volume)) $weight *= $volume;
        $allWeight = $weight * $amount;
        $note = $result[0]['note'];

        $arr = array(
            'cat_id' => $catId,
            'elem_id' => $elemId,
            'gost'=>$gost,
            'name'=>$name,
            'amount'=>$amount,
            'material'=>$material,
            'weight'=>$weight,
            'all_weight'=>$allWeight,
            'note'=>$note
        );

        //Если в сессии нет массива 'dataSpec' то создадим его
        if(!isset($_SESSION['dataSpec'])){
            $_SESSION['dataSpec'] = [];
        }
        //добавляем данные

        $replace = false;
        foreach ($_SESSION['dataSpec'] as $key => $value){
            if ($value['name'] == $arr['name']){

                $_SESSION['dataSpec'][$key]['amount'] = $value['amount'] + $arr['amount'];
                $_SESSION['dataSpec'][$key]['all_weight'] = $value['weight'] * $value['amount']+ $arr['all_weight'];
                $replace = true;
                break;
            }
        }
        if (!$replace){
            $_SESSION['dataSpec'][] = $arr;
        }

    }


    public static function sendDataInSpecification($id, $catId, $amount, $volume = null, $addName = null)
    {

        $pdo = Db::getConnection();

        //найдем другие данные
        $sql = "SELECT `tb_element`.`name`, `tb_element`.`weight`, 
                `tb_category`.`gost`, `tb_category`.`material`, `tb_element`.`note` FROM `tb_element`, `tb_category`
                 WHERE  `tb_category`.`id` =:catId and `tb_element`.`id` =:id;";

        $query = $pdo->prepare($sql);
        $query->execute(['id'=>$id, 'catId'=>$catId]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        //подготовим данные для добавления в pivot_table
        $userId = $_SESSION['user']['userId'];
        $catId = $catId;
        $elemId = $id;
        $gost = $result[0]['gost'];
        $name = $result[0]['name'];
        if (isset($addName)) $name .=" $addName";
        $amount = $amount;
        $material = $result[0]['material'];
        $weight = $result[0]['weight'];
        if (isset($volume)) $weight *= $volume;
        $allWeight = $weight * $amount;
        $note = $result[0]['note'];

        //делаем вставку в tb_pivot
        //ищем id по имени для определенного пользователя

        $sql = "SELECT `id` FROM `tb_pivot` WHERE `name`='$name' and `user_id` = '$userId'";
        $result = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

        if($result == false){
        $sql = "
        INSERT INTO `tb_pivot`(`user_id`, `cat_id`, `elem_id`, 
        `gost`, `name`, `amount`, 
        `material`, `weight`, `all_weight`, `note`) VALUES (
        '$userId', :catId, :elemId, '$gost', '$name',
        ROUND(:amount,1), '$material', ROUND('$weight',2), Round('$allWeight',1), '$note'
        );";
        $query = $pdo->prepare($sql)->execute(['catId'=>$catId, 'elemId'=>$elemId, 'amount'=>$amount]);

        } else {
            $id = $result['id'];
            $sql = "
        UPDATE `tb_pivot` SET `amount`=ROUND((`amount` + :amount),1), 
        `all_weight` = ROUND((`all_weight` + '$allWeight'),1) WHERE `id`='$id'
        ;";
            $query = $pdo->prepare($sql)->execute(['amount'=>$amount]);
        }

        return true;

    }

    public static function removeDataFromSession($name)
    {
        $count = count($_SESSION['dataSpec']);
        for($i = 0; $i < $count; $i++) {
            if ($_SESSION['dataSpec'][$i]['name'] == $name){
                break; // прогуляемся до нужного $i
            }
        }
        //удаляем нужный нам элемент из сессии
        array_splice($_SESSION['dataSpec'],$i,1);


    }


    public static function removeDataFromBD($id)
    {
        //получим уникальный номер юзера
        $userId = $_SESSION['user']['userId'];
        $pdo = Db::getConnection();
        $sql = "DELETE FROM `tb_pivot` WHERE `id`=:id and `user_id` = $userId;";
        $query = $pdo->prepare($sql)->execute(['id'=>$id]);

    }

    public static function changeDataInSession($name, $amount)
    {
        $count = count($_SESSION['dataSpec']);
        for($i = 0; $i < $count; $i++) {
            if ($_SESSION['dataSpec'][$i]['name'] == $name){
                break; // прогуляемся до нужного $i
            }
        }
        //удаляем нужный нам элемент из сессии
        $_SESSION['dataSpec'][$i]['amount'] = $amount;
        $_SESSION['dataSpec'][$i]['all_weight'] =
        $_SESSION['dataSpec'][$i]['weight'] * $amount;
    }

    public static function changeDataInDb($id, $amount)
    {
        $pdo = Db::getConnection();
        $sql = "
        UPDATE `tb_pivot` SET `amount`=ROUND((:amount),1), 
        `all_weight` = ROUND((`weight`*:amount),1) WHERE `id`=:id
        ;";

        $query = $pdo->prepare($sql)->execute(
            ['amount'=>$amount,
                'id'=>$id]);
    }

}