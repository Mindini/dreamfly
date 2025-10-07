<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); exit;
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Student Dashboard</title>
<link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container">
  <div class="card">
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?></h1>
  <div class="row">
    <div class="col">
      <ul>
        <li><a href="grades.php">Grades</a></li>
        <li><a href="../invoices/list.php">Invoices</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  </div>
  </div>
  </div></div>
</body>
</html>
