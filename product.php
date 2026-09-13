<?php
require_once __DIR__ . '/auth.php';

$requestedName = trim((string) ($_GET['name'] ?? ''));
$statement = $pdo->prepare('SELECT name, category, description, icon, price, stock FROM products WHERE name = ? LIMIT 1');
$statement->execute([$requestedName]);
$product = $statement->fetch();

if (!$product) {
	header('Location: products.php');
	exit;
}

$product['price'] = (float) $product['price'];
$product['stock'] = (int) $product['stock'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?> | Vendora</title>
	<link rel="stylesheet" href="style.css">
	<script src="theme.js"></script>
</head>
<body class="store-page">
	<header class="navbar"><a class="logo" href="index.php"><span>V</span> VENDORA</a><nav><a href="index.php">Home</a><a href="products.php" class="active">Products</a><a href="index.php#how-it-works">How It Works</a><a href="index.php#about">About</a></nav><div class="nav-buttons"><a href="products.php" class="login-btn">Products</a><a href="cart.php" class="register-btn">Cart (<span id="cart-count">0</span>)</a></div></header>
	<main class="store-main"><a class="back-link" href="products.php">&#8592; Back to products</a><section class="product-detail"><div class="detail-image"><?= htmlspecialchars($product['icon'], ENT_QUOTES, 'UTF-8') ?></div><div class="detail-copy"><span class="category"><?= htmlspecialchars(strtoupper($product['category']), ENT_QUOTES, 'UTF-8') ?></span><h1><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></h1><p><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></p><strong class="detail-price">₱<?= number_format($product['price'], 2) ?></strong><p class="stock-label detail-stock"><?= $product['stock'] > 0 ? $product['stock'] . ' in stock' : 'Out of stock' ?></p><button class="primary-btn" id="add-detail" type="button" <?= $product['stock'] === 0 ? 'disabled' : '' ?>><?= $product['stock'] > 0 ? 'Add to cart' : 'Unavailable' ?></button><p class="detail-message" id="detail-message" role="status"></p></div></section></main>
	<footer><div class="footer-logo"><span>V</span> VENDORA</div><p>Smart vending. Simple shopping.</p><div class="footer-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="login.php">Login</a></div><div class="copyright">&copy; 2026 Vendora. All rights reserved.</div></footer>
	<script>
		const product = <?= json_encode($product, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
		const name = product.name;
		let cart = JSON.parse(localStorage.getItem("vendoraCart") || "[]");
		const updateCartCount = () => document.querySelector("#cart-count").textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
		updateCartCount();
		document.querySelector("#add-detail").addEventListener("click", () => {
			const existing = cart.find(item => item.name === name);
			if (existing && existing.quantity >= product.stock) {
				document.querySelector("#detail-message").textContent = `Only ${product.stock} available.`;
				return;
			}
			if (existing) existing.quantity += 1;
			else cart.push({ name, price: Number(product.price), quantity: 1 });
			localStorage.setItem("vendoraCart", JSON.stringify(cart));
			updateCartCount();
			document.querySelector("#detail-message").textContent = `${name} added to your cart.`;
		});
	</script>
</body>
</html>
