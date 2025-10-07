<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { header('Location: login.php'); exit; }
$conn = db_connect();
// Show admin token from DB (sensitive)
$res = $conn->query("SELECT secret_token FROM admin_tokens LIMIT 1");
$token = '';
if ($res && $res->num_rows) { $token = $res->fetch_assoc()['secret_token']; }
?>
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Admin Profile</h1>
  <p>Admin Token: <strong><?php echo htmlspecialchars($token); ?></strong></p>
  <p><a href="dashboard.php" class="btn-inline">Back</a></p>
  </div></div>
  </div></div>
</body>
</html>
