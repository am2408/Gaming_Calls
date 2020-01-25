<?php
class RoleController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true ){
          $http->redirectTo('/');
      }
      $userModel = new UserModel();
      $updateRole = $userModel->profilRole();
      session_destroy();
      $http->redirectTo('/users/login');


    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
