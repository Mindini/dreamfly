<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $conn = db_connect();
    // Simple query to authenticate student users only (no prepared statements - intentional)
    $sql = "SELECT id, username, role, full_name FROM users WHERE username='" . $conn->real_escape_string($username) . "' AND password='" . $conn->real_escape_string($password) . "' LIMIT 1";
    $res = $conn->query($sql);
    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['full_name'] = $user['full_name'];
        if ($user['role'] === 'admin') {
            header('Location: admin/dashboard.php');
            exit;
        } else {
            header('Location: student/dashboard.php');
            exit;
        }
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dreamfly Login</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
    <h1>Dreamfly Campus - Login</h1>
    <?php if (!empty($error)) echo '<p class="alert error">'.htmlspecialchars($error).'</p>'; ?>
    <form method="post">
        <label>Username: <input name="username" /></label>
        <label>Password: <input type="password" name="password" /></label>
        <button type="submit">Login</button>
    </form>
    <p><a href="contact/feedback.php" class="btn-inline">Contact / Feedback</a></p>
</body>
</html>
