<?php
    include '../cfg.php';

    session_start();

    // Pobranie danych produktu z bazy danych
    function getProduct($productId) {
    global $link;
    $sql = "SELECT * FROM produkty WHERE id = $productId";
    $result = mysqli_query($link, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
    return $row;
    }
    return null;
    }

    // Dodanie produktu do koszyka
    function addToCart($productId, $quantity) {
    $product = getProduct($productId);

    if ($product && $quantity > 0) {
    $grossPrice = $product['cena_netto'] * (1 + $product['podatek_vat'] / 100);

    if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
    $_SESSION['cart'][$productId] = array(
    'quantity' => $quantity,
    'priceNet' => $product['cena_netto'],
    'vatRate' => $product['podatek_vat'],
    'grossPrice' => $grossPrice
    );
    }
    }
    }

    // Usunięcie produktu z koszyka
    function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
    unset($_SESSION['cart'][$productId]);
    }
    }

    // Wyświetlanie zawartości koszyka
    function showCart() {
    $total = 0;
    echo "<ul>";
        foreach ($_SESSION['cart'] as $productId => $product) {
        $productTotal = $product['grossPrice'] * $product['quantity'];
        $total += $productTotal;
        echo "<li>Produkt ID: $productId, Ilość: {$product['quantity']}, Cena Brutto: {$productTotal}</li>";
        }
        echo "</ul>";
    echo "Całkowita wartość: $total";
    }

?>
    <!-- Formularz dodawania produktu do koszyka -->
    <form action="" method="post">
        <input type="number" name="product_id" placeholder="ID Produktu" required>
        <input type="number" name="quantity" placeholder="Ilość" required>
        <button type="submit" name="add_to_cart">Dodaj do Koszyka</button>
    </form>

    <!-- Formularz usuwania produktu z koszyka -->
    <form action="" method="post">
        <input type="number" name="product_id" placeholder="ID Produktu" required>
        <button type="submit" name="remove_from_cart">Usuń z Koszyka</button>
    </form>

    <!-- Przycisk wyświetlający zawartość koszyka -->
    <form action="" method="post">
        <button type="submit" name="show_cart">Pokaż Koszyk</button>
    </form>

<?php
// Wyświetlanie koszyka
if (isset($_POST['show_cart'])) {
    showCart();
}
?>