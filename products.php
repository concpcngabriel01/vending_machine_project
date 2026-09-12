<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Products | Vendora</title>
	<link rel="stylesheet" href="style.css">
	<script src="theme.js"></script>
</head>

<body class="products-page">

	<header class="navbar">
		<a class="logo" href="index.php"><span>V</span> VENDORA</a>

		<nav>
			<a href="index.php">Home</a>
			<a href="products.php" class="active">Products</a>
			<a href="index.php#how-it-works">How It Works</a>
			<a href="index.php#about">About</a>
		</nav>

		<div class="nav-buttons">
			<a href="logout.php" class="login-btn">Logged in: <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></a>
			<a href="cart.php" class="register-btn cart-link">Cart (<span id="cart-count">0</span>)</a>
		</div>
	</header>

	<main>
		<section class="catalog-hero">
			<p class="small-title">VENDORA CATALOG</p>
			<h1>Pick something good.</h1>
			<p>Snacks, drinks, and everyday essentials ready whenever you are.</p>
		</section>

		<section class="catalog-section" aria-labelledby="catalog-title">
			<div class="catalog-toolbar">
				<div>
					<p class="section-label">SHOP NOW</p>
					<h2 id="catalog-title">All products</h2>
				</div>

				<div class="category-filters" aria-label="Product categories">
					<button class="filter-button active" type="button" data-category="all">All</button>
					<button class="filter-button" type="button" data-category="drinks">Drinks</button>
					<button class="filter-button" type="button" data-category="snacks">Snacks</button>
					<button class="filter-button" type="button" data-category="essentials">Essentials</button>
				</div>
			</div>

			<div class="catalog-grid">
				<article class="catalog-card" data-category="drinks" data-product="Cold Cola">
					<div class="catalog-image">🥤</div>
					<div class="catalog-info">
						<span class="category">DRINKS</span>
						<h3>Cold Cola</h3>
						<p>Classic fizz, chilled and ready to refresh.</p>
						<div class="product-action"><strong>₱45.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Citrus Splash">
					<div class="catalog-image">🍊</div>
					<div class="catalog-info">
						<span class="category">DRINKS</span>
						<h3>Citrus Splash</h3>
						<p>A bright, cold citrus drink for a quick lift.</p>
						<div class="product-action"><strong>₱50.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Choco Bar">
					<div class="catalog-image">🍫</div>
					<div class="catalog-info">
						<span class="category">SNACKS</span>
						<h3>Choco Bar</h3>
						<p>A sweet chocolate treat for your next break.</p>
						<div class="product-action"><strong>₱35.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Crunchy Cookies">
					<div class="catalog-image">🍪</div>
					<div class="catalog-info">
						<span class="category">SNACKS</span>
						<h3>Crunchy Cookies</h3>
						<p>Golden, crunchy cookies for an easy snack.</p>
						<div class="product-action"><strong>₱40.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Pocket Tissues">
					<div class="catalog-image">🧻</div>
					<div class="catalog-info">
						<span class="category">ESSENTIALS</span>
						<h3>Pocket Tissues</h3>
						<p>A handy everyday essential for when you need it.</p>
						<div class="product-action"><strong>₱25.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Hand Sanitizer">
					<div class="catalog-image">🧴</div>
					<div class="catalog-info">
						<span class="category">ESSENTIALS</span>
						<h3>Hand Sanitizer</h3>
						<p>Convenient protection in a pocket-sized bottle.</p>
						<div class="product-action"><strong>₱55.00</strong><button class="add-button" type="button">Add to cart</button></div>
					</div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Iced Coffee">
					<div class="catalog-image">☕</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Iced Coffee</h3><p>Cold coffee for a smooth energy boost.</p><div class="product-action"><strong>₱60.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Sparkling Water">
					<div class="catalog-image">💧</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Sparkling Water</h3><p>Clean, crisp bubbles for a refreshing pause.</p><div class="product-action"><strong>₱35.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Mango Juice">
					<div class="catalog-image">🧃</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Mango Juice</h3><p>Sweet tropical flavor in a convenient pack.</p><div class="product-action"><strong>₱45.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Energy Drink">
					<div class="catalog-image">⚡</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Energy Drink</h3><p>A quick boost for busy days and late nights.</p><div class="product-action"><strong>₱75.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Green Tea">
					<div class="catalog-image">🍵</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Green Tea</h3><p>Light, refreshing tea for a calmer break.</p><div class="product-action"><strong>₱40.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Strawberry Shake">
					<div class="catalog-image">🍓</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Strawberry Shake</h3><p>A creamy berry treat served cold.</p><div class="product-action"><strong>₱65.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="drinks" data-product="Lemonade">
					<div class="catalog-image">🍋</div>
					<div class="catalog-info"><span class="category">DRINKS</span><h3>Lemonade</h3><p>Bright lemon flavor with just the right zing.</p><div class="product-action"><strong>₱40.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Potato Chips">
					<div class="catalog-image">🥔</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Potato Chips</h3><p>Crunchy, salty, and perfect for sharing.</p><div class="product-action"><strong>₱45.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Cheese Crackers">
					<div class="catalog-image">🧀</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Cheese Crackers</h3><p>Savory little crackers with a cheesy bite.</p><div class="product-action"><strong>₱40.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Granola Bar">
					<div class="catalog-image">🍯</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Granola Bar</h3><p>Oats and goodness for a quick bite on the go.</p><div class="product-action"><strong>₱50.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Trail Mix">
					<div class="catalog-image">🥣</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Trail Mix</h3><p>A satisfying mix of nuts, fruit, and crunch.</p><div class="product-action"><strong>₱65.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Gummy Candies">
					<div class="catalog-image">🍬</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Gummy Candies</h3><p>Colorful chewy candy for a little sweetness.</p><div class="product-action"><strong>₱30.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Popcorn">
					<div class="catalog-image">🍿</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Popcorn</h3><p>Light, salty popcorn for movie-time cravings.</p><div class="product-action"><strong>₱35.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="snacks" data-product="Peanut Cookies">
					<div class="catalog-image">🥜</div>
					<div class="catalog-info"><span class="category">SNACKS</span><h3>Peanut Cookies</h3><p>Buttery cookies with a rich peanut flavor.</p><div class="product-action"><strong>₱45.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Wet Wipes">
					<div class="catalog-image">🧼</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Wet Wipes</h3><p>Freshen up quickly wherever your day takes you.</p><div class="product-action"><strong>₱35.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Face Mask Pack">
					<div class="catalog-image">😷</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Face Mask Pack</h3><p>A handy pack for crowded commutes and busy places.</p><div class="product-action"><strong>₱30.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Lip Balm">
					<div class="catalog-image">💄</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Lip Balm</h3><p>Simple everyday moisture for dry lips.</p><div class="product-action"><strong>₱45.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Pocket Comb">
					<div class="catalog-image">🪮</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Pocket Comb</h3><p>A compact grooming essential for quick touch-ups.</p><div class="product-action"><strong>₱25.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Travel Toothbrush">
					<div class="catalog-image">🪥</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Travel Toothbrush</h3><p>Stay fresh with a compact brush for the road.</p><div class="product-action"><strong>₱50.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>

				<article class="catalog-card" data-category="essentials" data-product="Mini Umbrella">
					<div class="catalog-image">☂️</div>
					<div class="catalog-info"><span class="category">ESSENTIALS</span><h3>Mini Umbrella</h3><p>A compact rainy-day backup for unexpected weather.</p><div class="product-action"><strong>₱120.00</strong><button class="add-button" type="button">Add to cart</button></div></div>
				</article>
			</div>

			<p class="catalog-message" id="catalog-message" role="status" aria-live="polite"></p>
		</section>
	</main>

	<footer>
		<div class="footer-logo"><span>V</span> VENDORA</div>
		<p>Smart vending. Simple shopping.</p>
		<div class="footer-links">
			<a href="index.php">Home</a>
			<a href="products.php">Products</a>
			<a href="index.php#about">About</a>
			<a href="login.php">Login</a>
		</div>
		<div class="copyright">&copy; 2026 Vendora. All rights reserved.</div>
	</footer>

	<script>
		const filterButtons = document.querySelectorAll(".filter-button");
		const productCards = document.querySelectorAll(".catalog-card");
		const cartCount = document.querySelector("#cart-count");
		const catalogMessage = document.querySelector("#catalog-message");
		let cart = JSON.parse(localStorage.getItem("vendoraCart") || "[]");

		const updateCartCount = () => {
			cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
		};

		productCards.forEach(card => {
			const detailsLink = document.createElement("a");
			detailsLink.className = "details-link";
			detailsLink.href = `product.php?name=${encodeURIComponent(card.dataset.product)}`;
			detailsLink.textContent = "Details";
			card.querySelector(".product-action").prepend(detailsLink);
		});

		filterButtons.forEach(button => {
			button.addEventListener("click", () => {
				filterButtons.forEach(item => item.classList.remove("active"));
				button.classList.add("active");

				const category = button.dataset.category;
				productCards.forEach(card => {
					card.hidden = category !== "all" && card.dataset.category !== category;
				});
			});
		});

		document.querySelectorAll(".add-button").forEach(button => {
			button.addEventListener("click", () => {
				const card = button.closest(".catalog-card");
				const name = card.dataset.product;
				const existingItem = cart.find(item => item.name === name);

				if (existingItem) {
					existingItem.quantity += 1;
				} else {
					const price = Number(card.querySelector("strong").textContent.replace(/[^0-9.]/g, ""));
					cart.push({ name, price, quantity: 1 });
				}

				localStorage.setItem("vendoraCart", JSON.stringify(cart));
				updateCartCount();
				catalogMessage.textContent = `${name} added to your cart.`;
				button.textContent = "Added";
				setTimeout(() => button.textContent = "Add to cart", 1200);
			});
		});

		updateCartCount();

	</script>
</body>
</html>
