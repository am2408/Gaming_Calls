<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }
    $productsModel = new ProductsModel();
    $product = $productsModel->getOneProduct($_GET['productId']);


    // var_dump($product);
    return [
      'product'=>$product
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $productsModel = new ProductsModel();
    $productsModel->updateProduct($_POST, $_FILES);
    return [
      'product'=>$product
    ];


  }
}
