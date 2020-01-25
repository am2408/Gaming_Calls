<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
         $http->redirectTo('/');
       }
       $productsModel = new ProductsModel();
       $productsModel->suppProduct($_GET['productId']);
       $http->redirectTo("/users/admin/product");

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
