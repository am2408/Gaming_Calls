<?php

class ChargeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }


    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       var_dump($_POST);
       $orders = json_decode($_POST['orders']);
       var_dump($orders);


       $totalAmount = 0;


       $productsModel = new ProductsModel();

       if ($_SESSION['role'] === 'pro'){
         foreach($orders as $order) {
             $product = $productsModel->getOneProduct($order->id);

             $order->safePrice = $product['Promo'];
             $totalAmount += ($order->safePrice*$order->quantity);
         }
        }else{
         foreach($orders as $order) {
           $product = $productsModel->getOneProduct($order->id);

           $order->safePrice = $product['Price'];
           $totalAmount += ($order->safePrice*$order->quantity);
         }
      }


       var_dump($orders);
       var_dump($totalAmount);
       $errorMessage = null;

       try {
         \Stripe\Stripe::setApiKey('sk_test_Dxcqjz8VWJZ0TSbg6ZtyWhx100iMEAz6SA');

         $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


         $token = $_POST['stripeToken'];


         $customer = \Stripe\Customer::create(array(
         	"email" => $_SESSION['email'],
         	"source" => $token
         ));

         $charge = \Stripe\Charge::create(array(
         	"amount" => $totalAmount * 100,
         	"currency" => "eur",
         	"description"=>"Commande ok",
         	"customer" => $customer->id,
          "receipt_email" => $customer->email
         ));

         $orderModel = new OrderModel();
         // $orderModel->saveOrder($orders, $_SESSION['id'], $totalAmount);

         $number = $orderModel->saveOrder($orders, $_SESSION['id'], $totalAmount);
         $http->redirectTo("/payment/charge/sucess?tid='.$charge->id.'&product='.$charge->decription.'&order='.$number");
       } catch (Exception $error) {
            $errorMessage = "Le paiement a échoué";
            if($error->httpStatus == 402) {
                $errorMessage = "Votre carte a malheureusement été refusé merci de tester une autre carte";
            } else {
                $errorMessage = "le paiement a échoué a malheureusement échoué, merci de tester ultérieurment";
            }

            return ['errorMessage' => $errorMessage];
        }




}
}
