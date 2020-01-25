<?php
class ProductsModel {

  public function getAllProducts() {
    $database = new Database();

    $sql = 'SELECT *
    FROM products';
    // var_dump($database);
    return $database->query($sql, []);


  }

  public function getOneProduct($id)
  {
    $database = new Database();
    $sql =
    'SELECT *
    FROM products
    WHERE Id = ?';
    // var_dump($database);
    return $database->queryOne($sql, [$id]);
  }

  public function updateProduct($_post, $_files)
  {
    $database = new Database();
    if (empty($files["product_pics"]["name"])) {
      $database->executeSql('UPDATE products
      SET Name = ?, Icon1_Des = ?, Icon2_Des = ?, Icon3_Des = ?, Description = ?, QuantityInStock = ?, BuyPrice = ?, Price = ?, Promo = Price/2
      WHERE Id = ?', [
      $_post["name"],
      $_post["icon1des"],
      $_post["icon2des"],
      $_post["icon3des"],
      $_post["description"],
      $_post["quantity"],
      $_post["buyPrice"],
      $_post["price"],
      $_post['productId']]
      );
    } else {
      $database->executeSql('UPDATE products
      SET Name = ?, Photo = ?, Icon1_Des = ?, Icon2_Des = ?, Icon3_Des = ?, Description = ?, QuantityInStock = ?, BuyPrice = ?, Price = ?, Promo = Price/2
      WHERE Id = ?', [
      $_post["name"],
      $_file["product_pics"]["name"],
      $_post["icon1des"],
      $_post["icon2des"],
      $_post["icon3des"],
      $_post["description"],
      $_post["quantity"],
      $_post["buyPrice"],
      $_post["price"],
      $_post['productId']]
      );
    }
    $http = new HTTP();
    $http->moveUploadedFile("product_pics", "/images/products/");
    $http->redirectTo("/users/admin");
  }

  public function addProduct($_post, $_file)
  {
      $database = new Database();
      if (empty($_file["product_pics"]["name"])) {
        $_file["product_pics"]["name"] = null;
      }
      if (empty($_file["product_hors"]["name"])) {
        $_file["product_hors"]["name"] = null;
      }
      if (empty($_file["product_left"]["name"])) {
        $_file["product_left"]["name"] = null;
      }
      if (empty($_file["product_screen"]["name"])) {
        $_file["product_screen"]["name"] = null;
      }
      if (empty($_file["product_right"]["name"])) {
        $_file["product_right"]["name"] = null;
      }
      if (empty($_file["product_light"]["name"])) {
        $_file["product_light"]["name"] = null;
      }
      if (empty($_file["product_logo"]["name"])) {
        $_file["product_logo"]["name"] = null;
      }
      if (empty($_file["product_gpu"]["name"])) {
        $_file["product_gpu"]["name"] = null;
      }
      if (empty($_file["product_icon1"]["name"])) {
        $_file["product_icon1"]["name"] = null;
        $_post["icon1des"] = null;
      }
      if (empty($_file["product_icon2"]["name"])) {
        $_file["product_icon2"]["name"] = null;
        $_post["icon2des"] = null;
      }
      if (empty($_file["product_icon3"]["name"])) {
        $_file["product_icon3"]["name"] = null;
        $_post["icon3des"] = null;
      }
      $database->executeSql("INSERT INTO products (Name, Photo, Horseman, Phone_Left, Screen, Phone_Right, Light, Logo, Gpu, Icon1, Icon2, Icon3, Icon1_Des, Icon2_Des, Icon3_Des, Description, QuantityInStock, BuyPrice, Price, Promo)
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,Price/2)", [
      $_post["name"],
      $_file["product_pics"]["name"],
      $_file["product_hors"]["name"],
      $_file["product_left"]["name"],
      $_file["product_screen"]["name"],
      $_file["product_right"]["name"],
      $_file["product_light"]["name"],
      $_file["product_logo"]["name"],
      $_file["product_gpu"]["name"],
      $_file["product_icon1"]["name"],
      $_file["product_icon2"]["name"],
      $_file["product_icon3"]["name"],
      $_post["icon1des"],
      $_post["icon2des"],
      $_post["icon3des"],
      $_post["description"],
      $_post["quantity"],
      $_post["buyPrice"],
      $_post["price"]
      ]);
    $http = new HTTP();
    $http->moveUploadedFile("product_pics", "/images/products/");
    $http->moveUploadedFile("product_hors", "/images/products/");
    $http->moveUploadedFile("product_left", "/images/products/");
    $http->moveUploadedFile("product_screen", "/images/products/");
    $http->moveUploadedFile("product_right", "/images/products/");
    $http->moveUploadedFile("product_light", "/images/products/");
    $http->moveUploadedFile("product_logo", "/images/products/");
    $http->moveUploadedFile("product_gpu", "/images/products/");
    $http->moveUploadedFile("product_icon1", "/images/products/");
    $http->moveUploadedFile("product_icon2", "/images/products/");
    $http->moveUploadedFile("product_icon3", "/images/products/");
    $http->redirectTo("/users/admin");
    exit();
  }

  public function suppProduct($id)
  {
    $database = new Database();
    $database->executeSql('DELETE FROM products WHERE Id = ?', [$id]);
  }

}
?>
