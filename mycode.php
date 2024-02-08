<?php
session_start(); // Start the session to store cart data

// Check if the cart data exists in the session, if not, initialize it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'addToBucket') {
        $productId = $_POST['productId'];
        $productTitle = $_POST['productTitle'];
        $quantity = (int)$_POST['quantity'];
        $size = $_POST['size'];
        $price = floatval($_POST['price']);

        $cartKey = "$productTitle - $size";

        if (array_key_exists($cartKey, $_SESSION['cart'])) {
            $_SESSION['cart'][$cartKey]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$cartKey] = array(
                'quantity' => $quantity,
                'price' => $price
            );
        }

        // You can echo or return any response if needed
        echo json_encode(['status' => 'success']);
        exit;
    }
}

// Handle updating the cart
function updateCart() {
    $cartItems = $_SESSION['cart'];
    $totalQuantity = 0;
    $totalSubtotal = 0;

    foreach ($cartItems as $cartKey => $cartItem) {
        list($productTitle, $size) = explode(' - ', $cartKey);
        $subtotal = $cartItem['quantity'] * $cartItem['price'];
        $totalQuantity += $cartItem['quantity'];
        $totalSubtotal += $subtotal;

        // Output or process the cart data as needed
        echo "<li>{$productTitle} - {$size} x {$cartItem['quantity']} - Subtotal: $" . number_format($subtotal, 2) . "</li>";
    }

    // Output total quantity and subtotal
    echo "<p>Total Quantity: $totalQuantity</p>";
    echo "<p>Subtotal: $" . number_format($totalSubtotal, 2) . "</p>";
}


?>
