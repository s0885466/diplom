<?php

class DefaultController
{
    public function actionIndex(){

        //echo 'Вызван actionIndex у DefaultController';
        $data = DefaultModel::getAllElements();

        $dataSidebar = DefaultModel::getSidebar();
        $dataSpecification = DefaultModel::getSpecification();

        require_once (ROOT.'/views/default/page.php');
        return true;
    }
}