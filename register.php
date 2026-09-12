<?php
require_once __DIR__ . '/config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($password !== $confirmPassword) {
        $message = 'Passwords do not match.';
    } else {
        try {
            $statement = $pdo->prepare('INSERT INTO users (fullname, username, email, password_hash) VALUES (?, ?, ?, ?)');
            $statement->execute([$fullname, $username, $email, password_hash($password, PASSWORD_DEFAULT)]);
            header('Location: login.php?registered=1');
            exit;
        } catch (PDOException $exception) {
            $message = $exception->errorInfo[1] === 1062 ? 'Username or email is already registered.' : 'Registration failed. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Vendora</title>
    <link rel="stylesheet" href="style.css">
    <script src="theme.js"></script>
</head>
<body>
    <div class="register-container">
        <h2>Create account</h2>
        <p class="subtitle">Register to start shopping with Vendora.</p>
        <form method="post">
            <label for="fullname">Full name</label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm-password">Confirm password</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
            <input type="submit" value="Create Account">
            <?php if ($message !== ''): ?><p class="auth-message" role="alert"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
