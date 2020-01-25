<?php

class DetailController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productsModel = new ProductsModel();
      $product = $productsModel->getOneProduct($_GET['productId']);
      return[
        "product"=>$product
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
?>
