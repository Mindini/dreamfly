<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { header('Location: login.php'); exit; }
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="/style.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Admin Dashboard</h1>
  <p>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?></p>
  <ul>
    <li><a href="feedback_review.php">Pending Feedback</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>
  </ul>
  </div></div>
  </div></div>
</body>
</html>
