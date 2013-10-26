<?php
class Controller {  
    public  static function login() {  
        echo "Login";  
    }  
    public function home() {  
        echo "Home";  
    }  
    public function logout() {  
        echo "Logout!!!";  
    }  
}  
$action=$_GET['action'];//要调用的方法名称在action参数里面  
//接着要动态调用指定的方法  
Controller::$action();//使用这种方法，这主要得益于PHP的“变量的变量”机制  
//当然，要先检查一下类有没有这个方法，可以用PHP的反射机制检测  
$reflectionClass=new ReflectionClass('Controller');  
$reflectionClass->hasMethod($action);//测试一个是否有对应的方法  

//以及测试一下方法是否是静态方法  
$reflectionMethod=$reflectionClass->getMethod($action);  
echo  $reflectionMethod->isStatic();//是静态方法则返回true  