<?php

class ProductController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $productsModel = new ProductsModel();
    $products = $productsModel->getAllProducts();
    return[
      'products'=>$products
    ];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {

  }
}
