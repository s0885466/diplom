<?php
//Подключаем родителя
//include_once (ROOT . '/models/ParentModel.php');

class PrivateModel extends ParentModel
{
    public static function isLogged()
    {

    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    }
    header("Location: /user/login");
    }

    public static function getUserById($id)
    {
        include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_users` WHERE `id`= :id";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

        return $query->fetch();

    }
    public static function getAllData()
    {
        include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_category`,`tb_element` 
                WHERE `tb_element`.`cat_id`=`tb_category`.id
                ORDER BY `name`";
        $query = $pdo->query($sql);

        return $query->fetchAll();
    }


    public static function removeOneElemFromDB($id)
    {
        $pdo = Db::getConnection();
        $sql = "DELETE FROM `tb_element` WHERE `id`=:id";
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $id]);
        return true;
    }

    public static function changeOneElemFromDB($id, $name, $weight)
    {
        $pdo = Db::getConnection();
        $sql = "UPDATE `tb_element` 
                SET `name`=:name,
                 `weight`=:weight
                 WHERE `id`=:id";
        $query = $pdo->prepare($sql);
        $query->execute(['id' => $id, 'name' => $name, 'weight' => $weight]);
        return true;
    }

    public static function addOneElemToDB($name, $title, $weight, $note)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT `id` FROM `tb_category` WHERE `title`=:title";
        $query = $pdo->prepare($sql);
        $query->execute(['title' => $title]);
        $result = $query->fetch();
        $cat_id = $result['id'];
        //пока эти вещи совпадают, при расширении програмы можно будет изменить
        $gost_id = $cat_id;
        $material_id = $cat_id;

        $sql = "SELECT `id` FROM `tb_element` WHERE `name`=:name and `cat_id` = :cat_id;";
        $query = $pdo->prepare($sql);
        $query->execute(['name' => $name, 'cat_id'=> $cat_id]);
        $result = $query->fetch();
        $id = $result['id'];

        if ($id == false) {

            $sql = "INSERT INTO `tb_element`(
        `cat_id`,
        `name`,
        `gost_id`,
        `material_id`,
        `weight`,
        `note`
        ) VALUES (
        :cat_id,
        :name,
        :gost_id,
        :material_id,
        :weight,
        :note
        );";
            $query = $pdo->prepare($sql);
            $query = $query->execute(
                ['cat_id' => $cat_id,
                    'name' => $name,
                    'gost_id' => $gost_id,
                    'material_id' => $material_id,
                    'weight' => $weight,
                    'note' => $note
                ]);
            return true;
        } else {
            $sql = "
            UPDATE `tb_element` SET `weight` = ROUND(:weight,2), 
            `note` = :note WHERE `id`='$id'
        ;";
            $query = $pdo->prepare($sql);
            $query = $query->execute(
                ['weight' => $weight,
                    'note' => $note
                ]);
            return true;
        }

    }

    public static function getAllFromTablePivot($user_id)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_pivot` WHERE `user_id`=:user_id";
        $query = $pdo->prepare($sql);
        $query->execute(['user_id' => $user_id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function createStrForFile($arr)
    {
        $count = count($arr);
        $str = 'Поз.'
            .'#'. 'Обозначение'
            .'#'. 'Наименование'
            .'#'. 'Кол.'
            .'#'. 'Материал'
            .'#'. 'ед.'
            .'#'. 'общ.'
            .'#'. 'Примечание.'
            ."\n";


        for ($i = 0; $i < $count ;$i++){
            $str .= $i+1 . '#'
                . $arr[$i]['gost']
                . '#' . $arr[$i]['name']
                . '#' . str_replace('.',',',$arr[$i]['amount'])
                . '#' . $arr[$i]['material']
                . '#' . str_replace('.',',',$arr[$i]['weight'])
                . '#' . str_replace('.',',',$arr[$i]['all_weight'])
                . '#' . $arr[$i]['note']
                ."\n";
            ;
        }

        return $str;
    }

    public static function sendFile($path,$email){

        $filename = $path; //Имя файла для прикрепления
        $to = $email; //Кому
        $from = "Сайт ИТМО"; //От кого
        $subject = "Файл со спецификацией"; //Тема
        $message = "Текстовое сообщение"; //Текст письма
        $boundary = "---"; //Разделитель
        /* Заголовки */
        $headers = "From: $from\nReply-To: $from\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
        $body = "--$boundary\n";
        /* Присоединяем текстовое сообщение */
        $body .= "Content-type: text/html; charset='utf-8'\n";
        $body .= "Content-Transfer-Encoding: quoted-printablenn";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
        $body .= $message."\n";
        $body .= "--$boundary\n";
        $file = fopen($filename, "r"); //Открываем файл
        $text = fread($file, filesize($filename)); //Считываем весь файл
        fclose($file); //Закрываем файл
        /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
        $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n";
        $body .= "Content-Transfer-Encoding: base64\n";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
        $body .= chunk_split(base64_encode($text))."\n";
        $body .= "--".$boundary ."--\n";
        mail($to, $subject, $body, $headers); //Отправляем письмо
    }


}