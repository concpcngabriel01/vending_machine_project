<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product | Vendora</title>
	<link rel="stylesheet" href="style.css">
	<script src="theme.js"></script>
</head>
<body class="store-page">
	<header class="navbar"><a class="logo" href="index.php"><span>V</span> VENDORA</a><nav><a href="index.php">Home</a><a href="products.php" class="active">Products</a><a href="index.php#how-it-works">How It Works</a><a href="index.php#about">About</a></nav><div class="nav-buttons"><a href="products.php" class="login-btn">Products</a><a href="cart.php" class="register-btn">Cart (<span id="cart-count">0</span>)</a></div></header>
	<main class="store-main"><a class="back-link" href="products.php">&#8592; Back to products</a><section class="product-detail" id="product-detail"></section></main>
	<footer><div class="footer-logo"><span>V</span> VENDORA</div><p>Smart vending. Simple shopping.</p><div class="footer-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="login.php">Login</a></div><div class="copyright">&copy; 2026 Vendora. All rights reserved.</div></footer>
	<script>
		const products = { "Cold Cola": ["DRINKS", "🥤", 45, "Classic fizz, chilled and ready to refresh."], "Citrus Splash": ["DRINKS", "🍊", 50, "A bright, cold citrus drink for a quick lift."], "Choco Bar": ["SNACKS", "🍫", 35, "A sweet chocolate treat for your next break."], "Crunchy Cookies": ["SNACKS", "🍪", 40, "Golden, crunchy cookies for an easy snack."], "Pocket Tissues": ["ESSENTIALS", "🧻", 25, "A handy everyday essential for when you need it."], "Hand Sanitizer": ["ESSENTIALS", "🧴", 55, "Convenient protection in a pocket-sized bottle."], "Iced Coffee": ["DRINKS", "☕", 60, "Cold coffee for a smooth energy boost."], "Sparkling Water": ["DRINKS", "💧", 35, "Clean, crisp bubbles for a refreshing pause."], "Mango Juice": ["DRINKS", "🧃", 45, "Sweet tropical flavor in a convenient pack."], "Energy Drink": ["DRINKS", "⚡", 75, "A quick boost for busy days and late nights."], "Green Tea": ["DRINKS", "🍵", 40, "Light, refreshing tea for a calmer break."], "Strawberry Shake": ["DRINKS", "🍓", 65, "A creamy berry treat served cold."], "Lemonade": ["DRINKS", "🍋", 40, "Bright lemon flavor with just the right zing."], "Potato Chips": ["SNACKS", "🥔", 45, "Crunchy, salty, and perfect for sharing."], "Cheese Crackers": ["SNACKS", "🧀", 40, "Savory little crackers with a cheesy bite."], "Granola Bar": ["SNACKS", "🍯", 50, "Oats and goodness for a quick bite on the go."], "Trail Mix": ["SNACKS", "🥣", 65, "A satisfying mix of nuts, fruit, and crunch."], "Gummy Candies": ["SNACKS", "🍬", 30, "Colorful chewy candy for a little sweetness."], "Popcorn": ["SNACKS", "🍿", 35, "Light, salty popcorn for movie-time cravings."], "Peanut Cookies": ["SNACKS", "🥜", 45, "Buttery cookies with a rich peanut flavor."], "Wet Wipes": ["ESSENTIALS", "🧼", 35, "Freshen up quickly wherever your day takes you."], "Face Mask Pack": ["ESSENTIALS", "😷", 30, "A handy pack for crowded commutes and busy places."], "Lip Balm": ["ESSENTIALS", "💄", 45, "Simple everyday moisture for dry lips."], "Pocket Comb": ["ESSENTIALS", "🪮", 25, "A compact grooming essential for quick touch-ups."], "Travel Toothbrush": ["ESSENTIALS", "🪥", 50, "Stay fresh with a compact brush for the road."], "Mini Umbrella": ["ESSENTIALS", "☂️", 120, "A compact rainy-day backup for unexpected weather."] };
		const name = new URLSearchParams(location.search).get("name") || "Cold Cola";
		const product = products[name] || products["Cold Cola"];
		const detail = document.querySelector("#product-detail");
		detail.innerHTML = `<div class="detail-image">${product[1]}</div><div class="detail-copy"><span class="category">${product[0]}</span><h1>${name}</h1><p>${product[3]}</p><strong class="detail-price">₱${product[2].toFixed(2)}</strong><button class="primary-btn" id="add-detail" type="button">Add to cart</button><p class="detail-message" id="detail-message" role="status"></p></div>`;
		let cart = JSON.parse(localStorage.getItem("vendoraCart") || "[]");
		document.querySelector("#cart-count").textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
		document.querySelector("#add-detail").addEventListener("click", () => {
			const existing = cart.find(item => item.name === name);
			if (existing) existing.quantity += 1;
			else cart.push({ name, price: product[2], quantity: 1 });
			localStorage.setItem("vendoraCart", JSON.stringify(cart));
			document.querySelector("#cart-count").textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
			document.querySelector("#detail-message").textContent = `${name} added to your cart.`;
		});
	</script>
</body>
</html>
