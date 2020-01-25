<?php

class ProfilController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }


       $orderModel = new OrderModel();
       $orders = $orderModel->getUserOrder($_SESSION['id']);
       return [
         'orders'=>$orders
       ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       $userModel = new UserModel();
       $userModel->updateUser($_POST);
       var_dump($_POST);
       $orderModel = new OrderModel();
       $orders = $orderModel->getUserOrder($_SESSION['id']);
       return [
         'orders'=>$orders
       ];
       // $http->redirectTo('users/profil');


    }
}
