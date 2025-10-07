<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: ../index.php'); exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Profile</title>
  <style>
    .container { max-width: 800px; margin: 50px auto; padding: 20px; }
    .card { background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .btn-inline { display: inline-block; padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; }
    .btn-inline:hover { background: #0056b3; }
  </style>
</head>
<body>
  <div class="container"><div class="card">
  <h1>Student Profile</h1>
      <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['full_name']); ?></p>
      <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
      <p><a href="dashboard.php" class="btn-inline">Back to Dashboard</a></p>
  </div></div>
  </body>
  </html>