<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 10.02.2019
 * Time: 11:02
 */
//Подключаем родителя
//include_once (ROOT . '/models/ParentModel.php');

class UserModel extends ParentModel
{

    public static function isUserDataExist($email,$password)
    {
        $password = md5($password . 'salt'); //шифруем пароль
        //include_once (ROOT.'/components/Db.php');
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM `tb_users` WHERE `email`= :email AND `password`= :password";
        $query = $pdo->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if($user){
            return $user['id'];
        }
        return false;

    }


    //регистрация нового пользователя
    public static function register($name, $email, $password)
    {
        $password = md5($password . 'salt'); //шифруем пароль
        $pdo = Db::getConnection();
        $sql = "INSERT INTO `tb_users`(`name`, `email`, `password`)
                VALUES(
                :name,
                :email,
                :password
                )";
        $query = $pdo->prepare($sql);
        $query->execute(['name'=> $name, 'email' => $email, 'password' => $password]);
        $query->fetchAll(PDO::FETCH_ASSOC);
        //выводим результат запроса в виде массива

        return $query;
    }

    private static function sendDataFromSessionToDB($userId)
    {
        if($_SESSION['dataSpec']){
            $pdo = Db::getConnection();

            foreach ($_SESSION['dataSpec'] as $key => $value){
                $sql = "
                INSERT INTO `tb_pivot`(
                `user_id`, 
                `cat_id`, 
                `elem_id`, 
                `gost`, 
                `name`, 
                `amount`, 
                `material`, 
                `weight`, 
                `all_weight`, 
                `note`) 
                VALUES (
                :user_id, 
                :cat_id, 
                :elem_id, 
                :gost, 
                :name, 
                :amount, 
                :material,
                :weight, 
                :all_weight, 
                :note
                );";
                $query = $pdo->prepare($sql)->execute([
                    'user_id'=>$userId,
                    'cat_id'=>$value['cat_id'],
                    'elem_id'=>$value['elem_id'],
                    'gost'=>$value['gost'],
                    'name'=>$value['name'],
                    'amount'=>$value['amount'],
                    'material'=>$value['material'],
                    'weight'=>$value['weight'],
                    'all_weight'=>$value['all_weight'],
                    'note'=>$value['note']
                ]);

            }
        }
    }

    //запоминаем пользователя
    public static function auth($userId, $email)
    {
        //добавим все элементы из сессии в БД, чтобы пользователь их не потерял
        self::sendDataFromSessionToDB($userId);

        //получим токен состящий из email, ip-адреса и браузера
        $token = md5(
        $email.
            $_SERVER['REMOTE_ADDR'].
            $_SERVER["HTTP_USER_AGENT"]
    );
        //создадим сессию user
        $_SESSION['user'] = [
            'email'=>$email,
            'userId'=>$userId,
            'token'=>$token
        ];
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function isPermission($userId)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT `permission` FROM `tb_users` WHERE `id`= :id";
        $query = $pdo->prepare($sql);
        $query->execute(['id'=> $userId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['permission'];
    }



}