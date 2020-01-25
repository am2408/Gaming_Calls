<?php
class OrderModel {

    public function saveOrder($orders, $userId, $totalAmount) {
		$database = new Database();
		$sql = "INSERT INTO orders (User_Id, CreationTimestamp) VALUES ( ?, NOW() )";

		$values = [ $userId ];

		$orderId = $database->executeSql($sql, $values);

		foreach($orders as $order) {
		    $sql = "INSERT INTO orderline (Quantity_ordered	,Product_Id, Order_Id, PriceEach) VALUES (?, ?, ?, ?)";
		    $values = [ $order->quantity, $order->id, $orderId, $order->safePrice ];
		    $database->executeSql($sql, $values);
		}


		$sql = "UPDATE orders SET TotalAmount=?, TaxAmount=?, TaxRate=? WHERE Id= ?";

		$taxRate = 20;
		$taxAmount = $totalAmount * $taxRate;


		$database->executeSql($sql, [ $totalAmount, $taxAmount, $taxRate, $orderId ]);

    return $orderId;

    }

    public function getAllOrders() {
        $database = new Database();

        $sql = 'SELECT *
           FROM orders
           ORDER BY orders.Id ASC';
        // var_dump($database);
        return $database->query($sql, []);


    }

    public function getUserOrder($id)
    {
      $database = new Database();
      $sql =
        'SELECT *
         FROM orders
         WHERE User_Id = ?
         ORDER BY orders.Id ASC';
      // var_dump($database);
      return $database->query($sql, [$id]);
    }

    public function getUserOrderDetails($id)
    {
      $database = new Database();
      $sql =
        'SELECT *
         FROM orderline
         INNER JOIN products ON orderline.Product_Id = products.Id
         INNER JOIN orders ON orderline.Order_Id = orders.Id
         INNER JOIN users ON orders.User_Id = users.Id
         WHERE orders.Id = ?';
      // var_dump($database);
      return $database->query($sql, [$id]);
    }

    public function sucessTime($user)
    {
      $database = new Database();

      $sql = "UPDATE orders SET CompleteTimestamp = NOW() WHERE Id = ?";

      $database->executeSql($sql, [$user]);
    }



}
?>
