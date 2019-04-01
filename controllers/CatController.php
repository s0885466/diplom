<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 05.02.2019
 * Time: 11:26
 */


class CatController
{

    public function actionOneElement($str1, $str2, $elNumber){

        $elNumber = intval($elNumber); //приведем в интежер на всякий пожарный
        //echo 'Вызван actionView с $elNumber = '.$elNumber;
        $link = "{$str1}/{$str2}/{$elNumber}";
        $data = CatModel::getOneElement($link); //передаем в view
        //Если нет такого элемента, то делаем редирект на главную
        if(!$data){
            header('Location: /');
            exit();
        }
        //подключаемся к базе данных конкретного элемента выборки
        //$data['id'] - номер категории
        $dataElem = CatModel::getCurrentElement($data['id']);


        //подключаем сайдбар
        $dataSidebar = CatModel::getSidebar();
        if (UserModel::isGuest()){
            $dataSpecification = CatModel::getSpecificationFromSession();
        } else {
            $dataSpecification = CatModel::getSpecification();
        }

        //Подключаем Views в зависимости от запроса
        require_once (ROOT."/views/{$str2}/page.php");
        return true;
    }
    public function actionListElements($str1, $str2, $elNumber){
        //подключаем модель


        //данные метод будет получать $id и $link  но не будет с ним работать
        //поскольку он ему просто не нужен, это не очень красиво, но
        // пока пускай работае так
        //echo 'Вызван actionIndex';

        $data = CatModel::getAllElements($str1, $str2);
        $dataSidebar = CatModel::getSidebar();
        if (UserModel::isGuest()){
            $dataSpecification = CatModel::getSpecificationFromSession();
        } else {
            $dataSpecification = CatModel::getSpecification();
        }

        //Подключаем Views в зависимости от запроса
        require_once (ROOT."/views/{$str2}/listpages.php");
        return true;
    }

    //Теперь методы AJAX

    public function actionAjax_structural_section($str1, $str2)
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $catId = filter_var($_POST['catId'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

        $error = [];

        if (!CheckModel::isChoose($name)) {
            $error[] = "Выберите элемент";
        }
        if (!CheckModel::isNumber($amount)) {
            $error[] = "неправильно задана длина";
        }

        if (count($error) < 1) {

            if (UserModel::isGuest()){
                DataModel::sendDataInSession($id, $catId, $amount);
            }
            else {
                DataModel::sendDataInSpecification($id, $catId, $amount);
            }
            echo true;

        } else {
            echo(json_encode($error, JSON_UNESCAPED_UNICODE));
        }
    }

    public function actionAjax_sheet()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $catId = filter_var($_POST['catId'], FILTER_SANITIZE_STRING);
        $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
        $amount = (int) $amount;
        $length = filter_var($_POST['length'],FILTER_SANITIZE_STRING);
        $width = filter_var($_POST['width'],FILTER_SANITIZE_STRING);
        $height = filter_var($_POST['height'],FILTER_SANITIZE_STRING);

        $error = [];

        //для проверки длины ширины и высоты нам подойдет функция isNumeric
        if (!CheckModel::isNumber($length)) {
            $error[] = "Неверная длина";
        }
        if (!CheckModel::isNumber($width)) {
            $error[] = "Неверная ширина";
        }
        if (!CheckModel::isNumber($height)) {
            $error[] = "Неверная высота";
        }
        if (!CheckModel::isNumber($amount)) {
            $error[] = "Неверное количество";
        }


        if (count($error) < 1) {

            $volume = $length * $width * $height/1000000;
            //добавка к имени
            $length = ceil($length);
            $width = ceil($width);
            $height = ceil($height);

            $addName =($length < $width)
                ?"{$height}x{$length}x{$width}"
                :"{$height}x{$width}x{$length}";

            if (UserModel::isGuest()){
                DataModel::sendDataInSession($id, $catId, $amount, $volume, $addName);
            }
            else {
                DataModel::sendDataInSpecification($id, $catId, $amount, $volume, $addName);
            }
            echo true;

        } else {
            echo(json_encode($error, JSON_UNESCAPED_UNICODE));
        }
    }

    public function actionAjax_electrode()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $catId = filter_var($_POST['catId'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING) ;
        $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

        $error = [];

        //Проверки на правильность написания
        if (!CheckModel::isChoose($name)) {
            $error[] = "Выберите элемент";
        }
        if (!CheckModel::isNumber($amount)) {
            $error[] = "неправильно задано количество";
        }


        if (count($error) < 1) {

            if (UserModel::isGuest()){
                DataModel::sendDataInSession($id, $catId, $amount);
            }
            else {
                DataModel::sendDataInSpecification($id, $catId, $amount);
            }
            echo true;

        } else {

            echo(json_encode($error, JSON_UNESCAPED_UNICODE));
        }
    }
    public function actionAjax_cover()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $catId = filter_var($_POST['catId'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING) ;
        $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

        $error = [];

        //Проверки на правильность написания
        if (!CheckModel::isChoose($name)) {
            $error[] = "Выберите элемент";
        }
        if (!CheckModel::isNumber($amount)) {
            $error[] = "неправильно задано количество";
        }


        if (count($error) < 1) {

            if (UserModel::isGuest()){
                DataModel::sendDataInSession($id, $catId, $amount);
            }
            else {
                DataModel::sendDataInSpecification($id, $catId, $amount);
            }
            echo true;

        } else {

            echo(json_encode($error, JSON_UNESCAPED_UNICODE));
        }
    }



}