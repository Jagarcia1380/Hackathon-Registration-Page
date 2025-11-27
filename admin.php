<?php
// admin.php - reads registrations.txt and displays registrations nicely

$file_path = "registrations.txt";
$rows = [];
if (file_exists($file_path)) {
    $rows = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin — Registrations</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <main class="container">
    <h1>Admin: Registrations</h1>

    <?php if (empty($rows)): ?>
      <p class="lead">No registrations yet.</p>
      <div class="actions">
        <a class="btn" href="index.html">Home</a>
        <a class="btn ghost" href="register.php">Register test user</a>
      </div>
    <?php else: ?>
      <div class="grid">
        <?php foreach ($rows as $row): ?>
          <?php
            $parts = explode(",", $row);
            // safety: ensure we have 5 parts; otherwise pad
            for ($i = 0; $i < 5; $i++) {
              if (!isset($parts[$i])) $parts[$i] = "";
            }
          ?>
          <div class="card">
            <p><strong>Name:</strong> <?= htmlspecialchars($parts[0]) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($parts[1]) ?></p>
            <p><strong>Track:</strong> <?= htmlspecialchars($parts[2]) ?></p>
            <p><strong>Shirt:</strong> <?= htmlspecialchars($parts[3]) ?></p>
            <p><strong>Loaner laptop:</strong> <?= htmlspecialchars($parts[4]) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="actions">
        <a class="btn" href="index.html">Home</a>
      </div>
    <?php endif; ?>

  </main>
</body>
</html>
