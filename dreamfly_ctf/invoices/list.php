<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['user_id'])) { header('Location: ../index.php'); exit; }
$conn = db_connect();
$uid = (int)$_SESSION['user_id'];
$res = $conn->query("SELECT id, invoice_no, amount, status FROM invoices WHERE user_id={$uid}");
?>
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Invoices</title>
  <link rel="stylesheet" href="/dreamfly_ctf/assets/styles.css">
</head>
<body>
<div class="container"><div class="card">
<h1>Your Invoices</h1>
<table><tr><th>ID</th><th>Invoice No</th><th>Amount</th><th>Status</th><th>Action</th></tr>
<?php while($row = $res->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['invoice_no']); ?></td>
    <td><?php echo htmlspecialchars($row['amount']); ?></td>
    <td><?php echo htmlspecialchars($row['status']); ?></td>
    <td><a href="view.php?id=<?php echo $row['id']; ?>">View</a></td>
  </tr>
<?php endwhile; ?>
</table>
<p><a href="../student/dashboard.php" class="btn-inline">Back</a></p>
</div></div>
  </div></div>
</body>
</html>
