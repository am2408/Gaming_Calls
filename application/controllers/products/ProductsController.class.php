<?php

class ProductsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

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
?>
