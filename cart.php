<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Cart | Vendora</title>
	<link rel="stylesheet" href="style.css">
	<script src="theme.js"></script>
</head>
<body class="store-page">
	<header class="navbar">
		<a class="logo" href="index.php"><span>V</span> VENDORA</a>
		<nav><a href="index.php">Home</a><a href="products.php">Products</a><a href="index.php#how-it-works">How It Works</a><a href="index.php#about">About</a></nav>
		<div class="nav-buttons"><a href="products.php" class="login-btn">Keep Shopping</a><a href="cart.php" class="register-btn">Cart (<span id="cart-count">0</span>)</a></div>
	</header>

	<main class="store-main">
		<section class="store-heading"><p class="small-title">YOUR ORDER</p><h1>Shopping cart</h1><p>Review your items before you check out.</p></section>
		<section class="cart-layout">
			<div class="cart-items" id="cart-items"></div>
			<aside class="order-summary"><p class="section-label">SUMMARY</p><h2>Your order</h2><div class="summary-row"><span>Items</span><strong id="summary-items">0</strong></div><div class="summary-row"><span>Total</span><strong id="summary-total">₱0.00</strong></div><a class="primary-btn checkout-button" id="checkout-link" href="checkout.php">Proceed to checkout</a></aside>
		</section>
	</main>

	<footer><div class="footer-logo"><span>V</span> VENDORA</div><p>Smart vending. Simple shopping.</p><div class="footer-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="login.php">Login</a></div><div class="copyright">&copy; 2026 Vendora. All rights reserved.</div></footer>

	<script>
		const prices = { "Cold Cola": 45, "Citrus Splash": 50, "Choco Bar": 35, "Crunchy Cookies": 40, "Pocket Tissues": 25, "Hand Sanitizer": 55, "Iced Coffee": 60, "Sparkling Water": 35, "Mango Juice": 45, "Energy Drink": 75, "Green Tea": 40, "Strawberry Shake": 65, "Lemonade": 40, "Potato Chips": 45, "Cheese Crackers": 40, "Granola Bar": 50, "Trail Mix": 65, "Gummy Candies": 30, "Popcorn": 35, "Peanut Cookies": 45, "Wet Wipes": 35, "Face Mask Pack": 30, "Lip Balm": 45, "Pocket Comb": 25, "Travel Toothbrush": 50, "Mini Umbrella": 120 };
		const icons = { "Cold Cola": "🥤", "Citrus Splash": "🍊", "Choco Bar": "🍫", "Crunchy Cookies": "🍪", "Pocket Tissues": "🧻", "Hand Sanitizer": "🧴", "Iced Coffee": "☕", "Sparkling Water": "💧", "Mango Juice": "🧃", "Energy Drink": "⚡", "Green Tea": "🍵", "Strawberry Shake": "🍓", "Lemonade": "🍋", "Potato Chips": "🥔", "Cheese Crackers": "🧀", "Granola Bar": "🍯", "Trail Mix": "🥣", "Gummy Candies": "🍬", "Popcorn": "🍿", "Peanut Cookies": "🥜", "Wet Wipes": "🧼", "Face Mask Pack": "😷", "Lip Balm": "💄", "Pocket Comb": "🪮", "Travel Toothbrush": "🪥", "Mini Umbrella": "☂️" };
		let cart = JSON.parse(localStorage.getItem("vendoraCart") || "[]");
		const itemsElement = document.querySelector("#cart-items");
		const money = value => `₱${value.toFixed(2)}`;

		const renderCart = () => {
			itemsElement.innerHTML = "";
			if (!cart.length) {
				itemsElement.innerHTML = '<div class="empty-state"><h2>Your cart is empty</h2><p>Find something you like in our catalog.</p><a class="primary-btn" href="products.php">Browse products</a></div>';
			}

			let total = 0;
			cart.forEach((item, index) => {
				const price = item.price || prices[item.name] || 0;
				total += price * item.quantity;
				const row = document.createElement("div");
				row.className = "cart-item";
				row.innerHTML = `<div class="cart-item-icon">${icons[item.name] || "🛒"}</div><div class="cart-item-info"><h3>${item.name}</h3><p>${money(price)} each</p></div><div class="quantity-control"><button type="button" data-action="decrease" data-index="${index}">-</button><span>${item.quantity}</span><button type="button" data-action="increase" data-index="${index}">+</button></div><strong>${money(price * item.quantity)}</strong><button class="remove-item" type="button" data-action="remove" data-index="${index}" aria-label="Remove ${item.name}">×</button>`;
				itemsElement.appendChild(row);
			});

			const count = cart.reduce((sum, item) => sum + item.quantity, 0);
			document.querySelector("#cart-count").textContent = count;
			document.querySelector("#summary-items").textContent = count;
			document.querySelector("#summary-total").textContent = money(total);
			document.querySelector("#checkout-link").classList.toggle("disabled", !cart.length);
		};

		itemsElement.addEventListener("click", event => {
			const button = event.target.closest("button[data-action]");
			if (!button) return;
			const index = Number(button.dataset.index);
			if (button.dataset.action === "increase") cart[index].quantity += 1;
			if (button.dataset.action === "decrease") cart[index].quantity -= 1;
			if (button.dataset.action === "remove" || cart[index].quantity <= 0) cart.splice(index, 1);
			localStorage.setItem("vendoraCart", JSON.stringify(cart));
			renderCart();
		});

		renderCart();
	</script>
</body>
</html>
