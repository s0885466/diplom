<?php

class Router
{
    private $routes; //массив с маршрутами
    public function __construct()
    {
       $this->routes = include_once (ROOT.'/config/routes.php');
    }
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return ltrim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function runController(){
        //Если мы не нашли контроллера то запускаем контроллер по умолчанию
        if (!$this->runControllerExceptDefault()){
            $pathController = ROOT .'/controllers/DefaultController.php';
            if (file_exists($pathController)){
                include_once ($pathController);
                //создаем объект класса контроллера
                $controllerObject = new DefaultController;
                //вызываем action(он будет либо View либо Index)
                $controllerObject->actionIndex();
            }
        };

    }
    private function runControllerExceptDefault()
    {
        //получим URL адрес без /
       $uri = $this->getURI();
       foreach ($this->routes as $pattern => $replacement){

           if (preg_match($pattern,$uri)){

               //получим строку вида cat/view/3
            $str = preg_replace($pattern,$replacement, $uri);
            //echo $str . '<br>';
            //делаем массив из строки
            $arr = explode('/',$str);
            //print_r($arr);

            //определим категорию
            $str1 = array_shift($arr);
            //echo "категория - $str1<br>";

            //определим имя контроллера
            $nameController = ucfirst($str1 . 'Controller');
            //echo "имя контроллера - $nameController<br>";

           $str2 = array_shift($arr);
               //echo "имя элемента - $str2<br>";
            //определим имя метода Action запускаемого контроллером(либо actionIndex либо actionView)
           $nameAction = 'action'.array_shift($arr);
               //echo "имя action - $nameAction<br>";
           //определим id для actionView
           $elNumber = array_shift($arr);
           //echo "номер элемента - $elNumber<br>";


           //подключаем контроллер
           $pathController = ROOT .'/controllers/'. $nameController . '.php';
           if (file_exists($pathController)){
                include_once ($pathController);
                //создаем объект класса контроллера
               $controllerObject = new $nameController;
               //вызываем action(он будет либо View либо Index)
               if (method_exists($controllerObject, $nameAction)) {
                   $controllerObject->$nameAction($str1, $str2, $elNumber);
               }
           }
               return true;
           }
       }
    }
}