<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { header('Location: login.php'); exit; }
$conn = db_connect();
$res = $conn->query("SELECT id, user, category, message, created_at FROM feedback ORDER BY created_at DESC");
?>
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Feedback Review</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Feedback Submissions</h1>
  <table><tr><th>ID</th><th>User</th><th>Category</th><th>Message</th><th>When</th></tr>
  <?php while($r = $res->fetch_assoc()): ?>
    <tr>
      <td><?php echo $r['id']; ?></td>
      <td><?php echo htmlspecialchars($r['user']); ?></td>
      <td><?php echo htmlspecialchars($r['category']); ?></td>
      <td><?php // intentionally output raw message to simulate admin view that executes JS
          echo $r['message'];
      ?></td>
      <td><?php echo $r['created_at']; ?></td>
    </tr>
  <?php endwhile; ?>
  </table>
  <p><a href="dashboard.php" class="btn-inline">Back</a></p>
  </div></div>
  </div></div>
</body>
</html>
