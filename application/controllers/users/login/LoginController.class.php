<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {


      $error = null;
      return[
        'error'=>$error
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       $userModel = new UserModel();
       $error = $userModel->logUser($_POST);
       

       if (array_key_exists('firstName', $_SESSION ) == false) {
         return [
           'error'=>$error
         ];
       }else {

          $http->redirectTo('/');
        }


    }
}
