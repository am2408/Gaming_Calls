<?php

class UserOrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }

       $orderModel = new OrderModel();
       $orders = $orderModel->getUserOrderDetails($_GET['id']);

       return [
         'orders'=>$orders
       ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
