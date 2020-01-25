<?php
class UserModel {
  public function addUser($post)
  {
    $database = new Database();
    $hashPassword = $this->hashPassword($post['password']);
    $user = $database->queryOne
    (
      "SELECT Id FROM users WHERE Email = ?", [ $post['email'] ]
    );
    if($user !== false) {
      return 'Email déja existant !';
    } else {
      $database->executeSql
      (
        'INSERT INTO users(FirstName, LastName, Email, Pseudo ,Role, Password, Address, City, Zip, CreationTimestamp)
        VALUES (?, ?, ?, ?, "user", ?, ?, ?, ?, NOW())',[
          $post['firstname'],
          $post['lastname'],
          $post['email'],
          $post['pseudo'],
          $hashPassword,
          $post['address'],
          $post['city'],
          $post['zip']]
        );
        $http = new Http();
        $http->redirectTo('/users/login');
        return null;
      }
    }

    private function verifyPassword($post, $hashPassword){
      return crypt($post, $hashPassword) == $hashPassword;
    }

    private function hashPassword($post){

      $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

      return crypt($post, $salt);
    }

    public function logUser($post)
    {
      $database = new Database();

      $login = $database->queryOne
      (
        'SELECT *
        FROM users
        WHERE Email = ? || Pseudo = ?',
        [
          $post['email'], $post['email']]
          );

          if ($login === false) {
            return "Addresse mail ou pseudo introuvable";
          } else {
            if( $login !== false && $this->verifyPassword($post['password'], $login['Password']) == true ) {
              $_SESSION['id'] = $login['Id'];
              $_SESSION['email'] = $login['Email'];
              $_SESSION['pseudo'] = $login['Pseudo'];
              $_SESSION['firstName'] = $login['FirstName'];
              $_SESSION['lastName'] = $login['LastName'];
              $_SESSION['role'] = $login['Role'];
              $_SESSION['address'] = $login['Address'];
              $_SESSION['city'] = $login['City'];
              $_SESSION['zip'] = $login['Zip'];
              return null;
            }
            else{
              return "Mot de passe introuvable";
            }
          }

        }

        public function getAllUsers() {
          $database = new Database();

          $sql = 'SELECT *
          FROM users';
          // var_dump($database);
          return $database->query($sql, []);

        }

        public function getOneUser() {
          $database = new Database();
          $sql = 'SELECT *
          FROM users
          WHERE Id = ?';
          // var_dump($database);
          return $database->queryOne($sql, [$_SESSION['id']]);
        }

        public function updateUser($post)
        {
          $database = new Database();

          $database->executeSql('UPDATE users
          SET FirstName = ?, LastName = ?, Pseudo = ?, Email = ?, Address = ?, City = ?, Zip = ?
          WHERE Id = ?', [
          $post['firstname'],
          $post['lastname'],
          $post['pseudo'],
          $post['email'],
          $post['address'],
          $post['city'],
          $post['zip'],
          $_SESSION['id']]
          );
          $_SESSION['email'] = $post['email'];
          $_SESSION['firstName'] = $post['firstname'];
          $_SESSION['pseudo'] = $post['pseudo'];
          $_SESSION['lastName'] = $post['lastname'];
          $_SESSION['address'] = $post['address'];
          $_SESSION['city'] = $post['city'];
          $_SESSION['zip'] = $post['zip'];

          $http = new Http();
          $http->redirectTo('users/profil');
        }

        public function updateRole($post)
        {
          if((array_key_exists('role', $_SESSION) === false) || $_SESSION['role'] === "user" || $_SESSION['role'] === "pro") {
            $http->redirectTo('users/login');
          }else{
            if ($post['valeur'] == 'pro' || $post['valeur'] == 'user') {
              $database = new Database();
              $database->executeSql(
              'UPDATE users
              SET Role = ?, Role_Plan = 10
              WHERE Id= ?',
              [
              ($post['valeur']),
              ($post['id'])
              ]);
              $http = new Http();
              $http->redirectTo('users/admin');
            }else if($post['valeur'] == 'admin'){
              $http = new Http();
              $http->redirectTo('users/admin');
            }
          }
        }

        public function profilRole()
        {
              $database = new Database();
              $database->executeSql(
              'UPDATE users
              SET Role = "user", Role_Plan = null
              WHERE Id= ?',
              [
              ($_SESSION['id'])
              ]);
            }

        public function deleteUser($userId)
        {
          $http = new Http();
          if((array_key_exists('role', $_SESSION) === false) || $_SESSION['role'] === "user" || $_SESSION['role'] === "pro") {
            $http->redirectTo('users/login');
          }else{
              $database = new Database();
              $database->executeSql('DELETE
                FROM users
                WHERE Id = ? && (Role = "user" || Role = "pro")',
                [$userId]);
              $http->redirectTo('users/admin');
            }
      }

    }
?>
