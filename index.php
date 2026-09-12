<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vendora | Smart Vending</title>

    <link rel="stylesheet" href="style.css">
    <script src="theme.js"></script>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <header class="navbar">

        <div class="logo">
            <span>V</span> VENDORA
        </div>

        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="products.php">Products</a>
            <a href="#how-it-works">How It Works</a>
            <a href="#about">About</a>
        </nav>

        <div class="nav-buttons">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <a href="logout.php" class="login-btn">Logged in: <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>
            <a href="register.php" class="register-btn">Register</a>
        </div>

    </header>


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-content">

            <p class="small-title">SMART • FAST • CONVENIENT</p>

            <h1>
                Your Favorite Products,
                <span>Anytime.</span>
            </h1>

            <p class="hero-text">
                Discover a smarter way to shop. Get your favorite
                snacks, drinks, and essentials from our modern
                vending machines.
            </p>

            <div class="hero-buttons">

                <a href="products.php" class="primary-btn">
                    Explore Products
                </a>

                <a href="#how-it-works" class="secondary-btn">
                    How It Works
                </a>

            </div>

        </div>


        <!-- Vending Machine Visual -->

        <div class="hero-machine">

            <div class="machine">

                <div class="machine-screen">
                    <span>VENDORA</span>
                    <small>READY</small>
                </div>

                <div class="machine-products">

                    <button class="machine-product" type="button" aria-label="Select a drink">🥤</button>
                    <button class="machine-product" type="button" aria-label="Select a chocolate bar">🍫</button>
                    <button class="machine-product" type="button" aria-label="Select a drink">🥤</button>
                    <button class="machine-product" type="button" aria-label="Select a cookie">🍪</button>
                    <button class="machine-product" type="button" aria-label="Select a chocolate bar">🍫</button>
                    <button class="machine-product" type="button" aria-label="Select a drink">🥤</button>

                </div>

                <button class="machine-slot" type="button" aria-label="Tap to pay">
                    INSERT / TAP
                </button>

            </div>

        </div>

    </section>


    <!-- ================= STATS ================= -->

    <section class="stats">

    <div class="stat">
        <h2 class="counter" data-target="24" data-suffix="/7">0/7</h2>
        <p>Available Anytime</p>
    </div>

    <div class="stat">
        <h2 class="counter" data-target="50" data-suffix="+">0+</h2>
        <p>Products</p>
    </div>

    <div class="stat">
        <h2 class="counter" data-target="10" data-suffix="+">0+</h2>
        <p>Locations</p>
    </div>

    <div class="stat">
        <h2 class="counter" data-target="99" data-suffix="%">0%</h2>
        <p>Customer Satisfaction</p>
    </div>

</section>

<script>
const stats = document.querySelector(".stats");
const counters = document.querySelectorAll(".counter");

const animateCounters = () => {
    counters.forEach(counter => {
        const target = Number(counter.dataset.target);
        const suffix = counter.dataset.suffix || "";
        const duration = 1400;
        const startTime = performance.now();

        const update = currentTime => {
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const easedProgress = 1 - Math.pow(1 - progress, 3);
            const value = Math.floor(easedProgress * target);

            counter.textContent = value + suffix;

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        };

        requestAnimationFrame(update);
    });
};

const statsObserver = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
        animateCounters();
        statsObserver.disconnect();
    }
}, { threshold: 0.4 });

statsObserver.observe(stats);
</script>


    <!-- ================= FEATURED PRODUCTS ================= -->

    <section class="products-section">

        <div class="section-heading">

            <p>OUR PRODUCTS</p>

            <h2>What would you like?</h2>

            <span>
                Grab your favorite snack or drink in seconds.
            </span>

        </div>


        <div class="product-grid">

            <div class="product-card">

                <div class="product-image">
                    🥤
                </div>

                <div class="product-info">

                    <span class="category">
                        DRINKS
                    </span>

                    <h3>Refreshing Drinks</h3>

                    <p>
                        Cold and refreshing beverages
                        available anytime.
                    </p>

                    <a href="products.php">
                        View Products →
                    </a>

                </div>

            </div>


            <div class="product-card">

                <div class="product-image">
                    🍫
                </div>

                <div class="product-info">

                    <span class="category">
                        SNACKS
                    </span>

                    <h3>Snacks & Treats</h3>

                    <p>
                        Quick snacks to keep you energized
                        throughout the day.
                    </p>

                    <a href="products.php">
                        View Products →
                    </a>

                </div>

            </div>


            <div class="product-card">

                <div class="product-image">
                    🍪
                </div>

                <div class="product-info">

                    <span class="category">
                        ESSENTIALS
                    </span>

                    <h3>Daily Essentials</h3>

                    <p>
                        Useful everyday products
                        when you need them.
                    </p>

                    <a href="products.php">
                        View Products →
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= HOW IT WORKS ================= -->

    <section class="how-section" id="how-it-works">

        <div class="section-heading">

            <p>HOW IT WORKS</p>

            <h2>Simple. Fast. Convenient.</h2>

            <span>
                Get what you need in just a few steps.
            </span>

        </div>


        <div class="steps">

            <div class="step">

                <div class="step-number">
                    01
                </div>

                <h3>Choose</h3>

                <p>
                    Browse our available products and
                    choose what you want.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    02
                </div>

                <h3>Pay</h3>

                <p>
                    Select your preferred payment method
                    and complete your purchase.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    03
                </div>

                <h3>Enjoy</h3>

                <p>
                    Collect your product from the machine
                    and enjoy.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= ABOUT ================= -->

    <section class="about-section" id="about">

        <div class="about-content">

            <p>ABOUT VENDORA</p>

            <h2>
                A smarter way to
                get what you need.
            </h2>

            <p>
                Vendora is designed to make everyday shopping
                faster and more convenient. Our smart vending
                machines provide easy access to snacks, drinks,
                and everyday essentials whenever you need them.
            </p>

            <a href="products.php" class="primary-btn">
                Browse Products
            </a>

        </div>

        <div class="about-box">

            <div>
                <strong>SMART</strong>
                <span>Modern technology</span>
            </div>

            <div>
                <strong>FAST</strong>
                <span>Quick transactions</span>
            </div>

            <div>
                <strong>EASY</strong>
                <span>Simple shopping</span>
            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta">

        <h2>
            Ready to get your
            favorite products?
        </h2>

        <p>
            Browse our products and find something you'll love.
        </p>

        <a href="products.php" class="primary-btn">
            Shop Now
        </a>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        <div class="footer-logo">
            <span>V</span> VENDORA
        </div>

        <p>
            Smart vending. Simple shopping.
        </p>

        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="#about">About</a>
            <a href="login.php">Login</a>
        </div>

        <div class="copyright">
            © 2026 Vendora. All rights reserved.
        </div>

    </footer>

    <script>
        const demoProducts = document.querySelectorAll(".machine-product");
        const demoScreen = document.querySelector(".machine-screen small");
        const demoSlot = document.querySelector(".machine-slot");
        let demoStep = 0;

        demoProducts.forEach(product => {
            product.addEventListener("click", () => {
                demoProducts.forEach(item => item.classList.remove("selected"));
                product.classList.add("selected");
                demoStep = 1;
                demoScreen.textContent = "SELECTED";
                demoSlot.textContent = "TAP TO PAY";
                demoSlot.classList.add("ready-to-pay");
            });
        });

        demoSlot.addEventListener("click", () => {
            if (demoStep === 0) {
                demoScreen.textContent = "CHOOSE ITEM";
                return;
            }

            if (demoStep === 1) {
                demoStep = 2;
                demoScreen.textContent = "PAYING...";
                demoSlot.textContent = "DISPENSING";
                demoSlot.classList.remove("ready-to-pay");
                demoSlot.classList.add("dispensing");

                setTimeout(() => {
                    demoStep = 3;
                    demoScreen.textContent = "READY";
                    demoSlot.textContent = "COLLECT ITEM";
                    demoSlot.classList.remove("dispensing");
                    demoSlot.classList.add("ready-to-collect");
                }, 1100);
                return;
            }

            if (demoStep === 3) {
                demoStep = 0;
                demoScreen.textContent = "DONE";
                demoSlot.textContent = "INSERT / TAP";
                demoSlot.classList.remove("ready-to-collect");
                demoProducts.forEach(item => item.classList.remove("selected"));
                setTimeout(() => demoScreen.textContent = "READY", 900);
            }
        });
    </script>

</body>
</html>
