<?php

class AddController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
      $http->redirectTo('/');
    }



  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $productsModel = new ProductsModel();
    $productsModel->addProduct($_POST, $_FILES);

  }
}
