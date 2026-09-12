<?php
require_once __DIR__ . '/config.php';

if (!empty($_SESSION['user_id'])) {
    header('Location: products.php');
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $statement = $pdo->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
    $statement->execute([$username]);
    $user = $statement->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: products.php');
        exit;
    }
    $message = 'Incorrect username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Vendora</title>
    <link rel="stylesheet" href="style.css">
    <script src="theme.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Welcome back</h2>
        <p class="subtitle">Log in to browse and order Vendora products.</p>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
            <?php if ($message !== ''): ?><p class="auth-message" role="alert"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
        </form>
        <p class="login-link">New to Vendora? <a href="register.php">Create an account</a></p>
    </div>
</body>
</html>
