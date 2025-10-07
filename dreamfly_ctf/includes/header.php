<?php
$title = $title ?? 'Dreamfly Campus';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($title); ?></title>
  <?php
  // Compute the project base so the stylesheet resolves correctly from any script path.
  // Adjust $projectName if you renamed the folder that holds the project.
  $projectName = '/dreamfly_ctf';
  $script = $_SERVER['SCRIPT_NAME'] ?? '';
  $pos = strpos($script, $projectName);
  $base = ($pos === false) ? '' : substr($script, 0, $pos + strlen($projectName));
  $css_url = $base . '/assets/styles.css';
  ?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($css_url); ?>">
</head>
<body>
