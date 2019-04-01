<?php
class DataController
{

    private function removeFromSession($name)
    {
        DataModel::removeDataFromSession($name);
        return true;
    }

    private function removeFromBD($id)
    {
        DataModel::removeDataFromBD($id);
        return true;
    }

    private function changeInSession($name,$amount)
    {
        DataModel::changeDataInSession($name,$amount);
        return true;
    }

    private function changeInDb($id, $amount)
    {
        DataModel::changeDataInDb($id, $amount);
        return true;
    }


    public function actionRemoveOneElemFromSpecification($str1, $str2, $elNumber)
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $error = [];

        if (!CheckModel::isId($id)){
            $error[] = 'Неверный id';
        }

        if (!CheckModel::isStr($name)){
            $error[] = 'Неверное имя';
        }

        if (count($error) < 1) {
            if (UserModel::isGuest()) {
                echo $this->removeFromSession($name);
            } else {
                echo $this->removeFromBD($id);
            }
        } else echo(json_encode($error, JSON_UNESCAPED_UNICODE));

    }
    public function actionChangeOneElemInSpecification()
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

        $error = [];

        if (!CheckModel::isId($id)){
            $error[] = 'Неверный id';
        }

        if (!CheckModel::isStr($name)){
            $error[] = 'Неверное имя';
        }

        if (!CheckModel::isNumber($amount)){
            $error[] = 'Неверное количество';
        }

       if (count($error) < 1){

            if (UserModel::isGuest()){
                echo $this->changeInSession($name,$amount);
            } else {
                echo $this->changeInDb($id,$amount);
            }

        } else echo(json_encode($error, JSON_UNESCAPED_UNICODE));

    }
}

