<?php
require_once __DIR__ . '/../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_SESSION['username'] ?? 'anonymous';
    $category = $_POST['category'] ?? '';
    $message = $_POST['message'] ?? '';
    $conn = db_connect();
    // Intentionally store raw message to simulate stored XSS
    $stmt = $conn->prepare("INSERT INTO feedback (user, category, message, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param('sss', $user, $category, $message);
    $stmt->execute();
    $saved = true;
}
?>
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Feedback</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Submit Feedback</h1>
  <?php if (!empty($saved)) echo '<div class="alert success">Feedback submitted</div>'; ?>
  <form method="post">
    <label>Category: <select name="category"><option>General</option><option>Bug</option><option>Security</option></select></label>
    <label>Message:<br /><textarea name="message"></textarea></label>
    <button type="submit">Submit</button>
  </form>
  <p><a href="../index.php" class="btn-inline">Home</a></p>
  </div></div>
  </div></div>
</body>
</html>
