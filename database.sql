CREATE DATABASE IF NOT EXISTS vendora CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE vendora;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(120) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL UNIQUE,
    category ENUM('drinks', 'snacks', 'essentials') NOT NULL,
    description VARCHAR(255) NOT NULL,
    icon VARCHAR(10) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, category, description, icon, price, stock) VALUES
('Cold Cola', 'drinks', 'Classic fizz, chilled and ready to refresh.', '🥤', 45.00, 20),
('Citrus Splash', 'drinks', 'A bright, cold citrus drink for a quick lift.', '🍊', 50.00, 15),
('Choco Bar', 'snacks', 'A sweet chocolate treat for your next break.', '🍫', 35.00, 25),
('Crunchy Cookies', 'snacks', 'Golden, crunchy cookies for an easy snack.', '🍪', 40.00, 18),
('Pocket Tissues', 'essentials', 'A handy everyday essential for when you need it.', '🧻', 25.00, 30),
('Hand Sanitizer', 'essentials', 'Convenient protection in a pocket-sized bottle.', '🧴', 55.00, 12),
('Iced Coffee', 'drinks', 'Cold coffee for a smooth energy boost.', '☕', 60.00, 10),
('Sparkling Water', 'drinks', 'Clean, crisp bubbles for a refreshing pause.', '💧', 35.00, 22),
('Mango Juice', 'drinks', 'Sweet tropical flavor in a convenient pack.', '🧃', 45.00, 16),
('Energy Drink', 'drinks', 'A quick boost for busy days and late nights.', '⚡', 75.00, 8),
('Green Tea', 'drinks', 'Light, refreshing tea for a calmer break.', '🍵', 40.00, 14),
('Strawberry Shake', 'drinks', 'A creamy berry treat served cold.', '🍓', 65.00, 9),
('Lemonade', 'drinks', 'Bright lemon flavor with just the right zing.', '🍋', 40.00, 20),
('Potato Chips', 'snacks', 'Crunchy, salty, and perfect for sharing.', '🥔', 45.00, 24),
('Cheese Crackers', 'snacks', 'Savory little crackers with a cheesy bite.', '🧀', 40.00, 17),
('Granola Bar', 'snacks', 'Oats and goodness for a quick bite on the go.', '🍯', 50.00, 13),
('Trail Mix', 'snacks', 'A satisfying mix of nuts, fruit, and crunch.', '🥣', 65.00, 11),
('Gummy Candies', 'snacks', 'Colorful chewy candy for a little sweetness.', '🍬', 30.00, 26),
('Popcorn', 'snacks', 'Light, salty popcorn for movie-time cravings.', '🍿', 35.00, 19),
('Peanut Cookies', 'snacks', 'Buttery cookies with a rich peanut flavor.', '🥜', 45.00, 15),
('Wet Wipes', 'essentials', 'Freshen up quickly wherever your day takes you.', '🧼', 35.00, 21),
('Face Mask Pack', 'essentials', 'A handy pack for crowded commutes and busy places.', '😷', 30.00, 28),
('Lip Balm', 'essentials', 'Simple everyday moisture for dry lips.', '💄', 45.00, 10),
('Pocket Comb', 'essentials', 'A compact grooming essential for quick touch-ups.', '🪮', 25.00, 7),
('Travel Toothbrush', 'essentials', 'Stay fresh with a compact brush for the road.', '🪥', 50.00, 12),
('Mini Umbrella', 'essentials', 'A compact rainy-day backup for unexpected weather.', '☂️', 120.00, 5)
ON DUPLICATE KEY UPDATE
    category = VALUES(category), description = VALUES(description), icon = VALUES(icon),
    price = VALUES(price);
