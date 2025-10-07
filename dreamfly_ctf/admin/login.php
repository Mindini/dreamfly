<?php
require_once __DIR__ . '/../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';
    $conn = db_connect();
    // Vulnerable to SQLi on purpose - no escaping or prepared statements
    $sql = "SELECT id, username, full_name, role FROM users WHERE username = '$u' AND password = '$p' AND role='admin' LIMIT 1";
    $res = $conn->query($sql);
    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['full_name'] = $user['full_name'];
        header('Location: dashboard.php'); exit;
    } else {
        $error = 'Invalid admin credentials';
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Admin Login</h1>
  <?php if (!empty($error)) echo '<div class="alert error">'.htmlspecialchars($error).'</div>'; ?>
  <form method="post">
    <label>Username: <input name="username" /></label>
    <label>Password: <input type="password" name="password" /></label>
    <button type="submit">Login</button>
  </form>
  <p><a href="../index.php" class="btn-inline">Home</a></p>
  </div></div>
  </div></div>
</body>
</html>
