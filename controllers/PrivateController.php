<?php
class PrivateController
{
    public function actionCabinet($str1, $str2)
    {

        $user = PrivateModel::isLogged();
        $userId = $user['userId'];

        if (UserModel::isPermission($userId)){
            header("Location: /private/admin");
        }

        $dataSidebar = PrivateModel::getSidebar();
        $dataSpecification = CatModel::getSpecification();

        $user = PrivateModel::getUserById($userId);
        //Подключаем Views в зависимости от запроса
        require_once (ROOT."/views/{$str2}/page.php");

    }

    public function actionAdmin($str1, $str2)
    {
        $user = PrivateModel::isLogged();
        $userId = $user['userId'];
        if (!UserModel::isPermission($userId)){
            header("Location: /private/cabinet");
        }

        $dataAll = PrivateModel::getAllData();
        $dataSidebar = PrivateModel::getSidebar();

        $user = PrivateModel::getUserById($userId);
        //Подключаем Views в зависимости от запроса
        require_once (ROOT."/views/cabinet/admin.php");
    }

    //пошли методы AJAX
    public function actionAddOne()
    {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $mass = filter_var($_POST['mass'], FILTER_SANITIZE_STRING);
        $note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);
        $error = [];

        if (!CheckModel::isStr($name)){
            $error['add_name'] = 'Неверное обозначение';
        }
        if (!CheckModel::isStr($title)){
            $error['add_title'] = 'Неверный тип';
        }
        if (!CheckModel::isNumber($mass)){
            $error['add_mass'] = 'Неверная масса';
        }


        if (empty($error))
        {
            $result = PrivateModel::addOneElemToDB($name, $title, $mass, $note);
            echo $result;
        } else echo(json_encode($error, JSON_UNESCAPED_UNICODE));
    }

    public function actionRemoveOne()
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        $error = [];

        if (!CheckModel::isNumber($id)){
            $error[] = 'Ошибка';
        }

        if (count($error) < 1){
            $result = PrivateModel::removeOneElemFromDB($id);
            echo $result;
        } else echo(json_encode($error, JSON_UNESCAPED_UNICODE));

    }

    public function actionChangeOne()
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $weight = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
        $error = [];

        if (!CheckModel::isNumber($id)){
            $error['id'] = 'Неверный id';
        }
        if (!CheckModel::isStr($name)){
            $error['name'] = 'Неверное обозначение';
        }
        if (!CheckModel::isNumber($weight)){
            $error['weight'] = 'Неверная масса';
        }

        if (empty($error)){
            $result = PrivateModel::changeOneElemFromDB($id, $name, $weight);
            echo $result;
        } else echo(json_encode($error, JSON_UNESCAPED_UNICODE));

    }

    public function actionDownload(){
        if (CheckModel::isDoubleClick(1)){
            return false;
        }

        $userId = filter_var($_POST['userId'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $arr = PrivateModel::getAllFromTablePivot($userId);
        if(empty($arr)){
            return false;
        }
        $str = PrivateModel::createStrForFile($arr);
        $dir = ROOT . "/file";
        $path = "$dir" . "/" . "$userId.txt";

        file_put_contents($path, $str);

        if (file_exists($path)){
            PrivateModel::sendFile($path, $email);

            echo true;
        } else echo false;


    }

}