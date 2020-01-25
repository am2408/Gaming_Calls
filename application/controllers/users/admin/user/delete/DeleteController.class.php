<?php
class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
          $http->redirectTo('/');
      }

       $userModel = new UserModel();

       $deleteUser = $userModel->deleteUser($_GET['userId']);
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}
