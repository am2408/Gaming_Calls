<?php
class RoleController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
          $http->redirectTo('/');
      }




    }

    public function httpPostMethod(Http $http, array $formFields)
    {

       // $json = json_encode($_POST);
       $userModel = new UserModel();
       $updateRole = $userModel->updateRole($_POST);
       var_dump($updateRole);
       // $http->redirectTo('user/admin');


    }
}
