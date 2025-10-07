<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id'])) { header('Location: ../index.php'); exit; }
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$conn = db_connect();
// IDOR: no ownership check - intentional vulnerability
$res = $conn->query("SELECT * FROM invoices WHERE id={$id} LIMIT 1");
if (!$res || $res->num_rows === 0) { echo 'Invoice not found'; exit; }
$inv = $res->fetch_assoc();
?>
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Invoice <?php echo htmlspecialchars($inv['invoice_no']); ?></title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
  <div class="container"><div class="card">
  <h1>Invoice <?php echo htmlspecialchars($inv['invoice_no']); ?></h1>
  <p>Amount: <?php echo htmlspecialchars($inv['amount']); ?></p>
  <p>Status: <?php echo htmlspecialchars($inv['status']); ?></p>
  <h3>Details</h3>
  <pre><?php
    // Display associated invoice file if present
    $file = __DIR__ . '/invoice_' . $inv['id'] . '.txt';
    if (file_exists($file)) {
        echo htmlspecialchars(file_get_contents($file));
    } else {
        echo "No extra details.";
    }
  ?></pre>
  <p><a href="list.php" class="btn-inline">Back</a></p>
  </div></div>
  </div></div>
</body>
</html>
