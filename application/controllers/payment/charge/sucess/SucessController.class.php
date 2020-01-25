<?php

class SucessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }


       $user = substr($_GET['order'], 2);
       // var_dump($user);
       $orderModel = new OrderModel();
       $orderModel->sucessTime($user);



       return[
         "user"=>$user
       ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
