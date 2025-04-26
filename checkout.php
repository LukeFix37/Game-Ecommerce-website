<?php
session_start();
include 'includes/config.php';

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. <a href='products.php'>Go to Products</a></p>";
    exit();
}

// Fetch cart items
$cart_items = [];
$total = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $product['quantity'] = $quantity;
        $product['subtotal'] = $product['price'] * $quantity;
        $cart_items[] = $product;
        $total += $product['subtotal'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Gaming Gear Store</title>
  <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
  <div class="container">
    <h2>Checkout</h2>

    <table class="cart-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart_items as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['name']); ?></td>
          <td>$<?php echo number_format($item['price'], 2); ?></td>
          <td><?php echo $item['quantity']; ?></td>
          <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>

    <!-- Place Order Button -->
    <form action="./includes/process-order.php" method="post">
      <button type="submit" class="btn checkout-btn">Place Order</button>
    </form>

  </div>
</body>
</html>
