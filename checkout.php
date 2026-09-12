<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Vendora</title>
    <link rel="stylesheet" href="style.css">
    <script src="theme.js"></script>
</head>
<body class="store-page">
    <header class="navbar">
        <a class="logo" href="index.php"><span>V</span> VENDORA</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="index.php#how-it-works">How It Works</a>
            <a href="index.php#about">About</a>
        </nav>
        <div class="nav-buttons">
            <a href="cart.php" class="login-btn">Back to cart</a>
            <a href="products.php" class="register-btn">Shop</a>
        </div>
    </header>

    <main class="store-main">
        <section class="store-heading">
            <p class="small-title">FINAL STEP</p>
            <h1>Checkout</h1>
            <p>Complete your details and place your order.</p>
        </section>

        <section class="checkout-layout">
            <form class="checkout-form" id="checkout-form">
                <h2>Delivery details</h2>
                <label for="name">Full name</label>
                <input id="name" name="name" required>
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" required>
                <label for="address">Delivery address</label>
                <textarea id="address" name="address" rows="4" required></textarea>

                <fieldset class="payment-section">
                    <legend>Payment method</legend>
                    <p class="payment-hint">Choose your preferred payment option.</p>
                    <div class="payment-group">
                        <span class="payment-group-title">Pay in cash</span>
                        <label class="payment-option">
                            <input type="radio" name="payment" value="Cash on delivery" checked>
                            <span class="payment-icon">₱</span>
                            <span><strong>Cash</strong><small>Pay Cash</small></span>
                        </label>
                    </div>
                    <div class="payment-group">
                        <span class="payment-group-title">E-wallets</span>
                        <div class="payment-grid">
                            <label class="payment-option">
                                <input type="radio" name="payment" value="GCash">
                                <span class="payment-icon">G</span>
                                <span><strong>GCash</strong><small>Fast payment through GCash</small></span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="payment" value="Maya">
                                <span class="payment-icon">M</span>
                                <span><strong>Maya</strong><small>Pay with your Maya wallet</small></span>
                            </label>
                        </div>
                    </div>
                </fieldset>

                <button class="primary-btn" type="submit">Place order</button>
                <p class="checkout-message" id="checkout-message" role="status"></p>
            </form>

            <aside class="order-summary">
                <p class="section-label">ORDER TOTAL</p>
                <h2 id="checkout-items">Your order</h2>
                <div class="summary-row"><span>Items</span><strong id="item-count">0</strong></div>
                <div class="summary-row"><span>Total</span><strong id="checkout-total">₱0.00</strong></div>
            </aside>
        </section>
    </main>

    <footer>
        <div class="footer-logo"><span>V</span> VENDORA</div>
        <p>Smart vending. Simple shopping.</p>
        <div class="footer-links"><a href="index.php">Home</a><a href="products.php">Products</a><a href="login.php">Login</a></div>
        <div class="copyright">&copy; 2026 Vendora. All rights reserved.</div>
    </footer>

    <div class="success-modal" id="success-modal" role="dialog" aria-modal="true" aria-labelledby="success-title" hidden>
        <div class="success-modal-card">
            <button class="modal-close" id="modal-close" type="button" aria-label="Close confirmation">&times;</button>
            <div class="success-mark">&#10003;</div>
            <p class="section-label">ORDER CONFIRMED</p>
            <h2 id="success-title">Payment successful!</h2>
            <p>Your Vendora order has been placed successfully.</p>
            <small id="order-reference"></small>
            <a class="primary-btn" href="products.php">Continue shopping</a>
        </div>
    </div>

    <script>
        const prices = { "Cold Cola": 45, "Citrus Splash": 50, "Choco Bar": 35, "Crunchy Cookies": 40, "Pocket Tissues": 25, "Hand Sanitizer": 55, "Iced Coffee": 60, "Sparkling Water": 35, "Mango Juice": 45, "Energy Drink": 75, "Green Tea": 40, "Strawberry Shake": 65, "Lemonade": 40, "Potato Chips": 45, "Cheese Crackers": 40, "Granola Bar": 50, "Trail Mix": 65, "Gummy Candies": 30, "Popcorn": 35, "Peanut Cookies": 45, "Wet Wipes": 35, "Face Mask Pack": 30, "Lip Balm": 45, "Pocket Comb": 25, "Travel Toothbrush": 50, "Mini Umbrella": 120 };
        const cart = JSON.parse(localStorage.getItem("vendoraCart") || "[]");
        const total = cart.reduce((sum, item) => sum + (item.price || prices[item.name] || 0) * item.quantity, 0);
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        const successModal = document.querySelector("#success-modal");
        const closeModal = () => {
            successModal.hidden = true;
            document.body.classList.remove("modal-open");
        };

        document.querySelector("#item-count").textContent = count;
        document.querySelector("#checkout-items").textContent = count ? "Your order" : "No items yet";
        document.querySelector("#checkout-total").textContent = `₱${total.toFixed(2)}`;

        document.querySelector("#checkout-form").addEventListener("submit", event => {
            event.preventDefault();
            const message = document.querySelector("#checkout-message");
            if (!cart.length) {
                message.textContent = "Your cart is empty. Add a product first.";
                return;
            }
            localStorage.removeItem("vendoraCart");
            message.textContent = "Order placed successfully. Thank you for shopping with Vendora!";
            document.querySelector("#order-reference").textContent = `Reference: VN-${Date.now().toString().slice(-6)}`;
            successModal.hidden = false;
            document.body.classList.add("modal-open");
            event.target.reset();
        });

        document.querySelector("#modal-close").addEventListener("click", closeModal);
        successModal.addEventListener("click", event => {
            if (event.target === successModal) closeModal();
        });
        document.addEventListener("keydown", event => {
            if (event.key === "Escape" && !successModal.hidden) closeModal();
        });
    </script>
</body>
</html>