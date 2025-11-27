<?php
// details.php - reads cookies and greets the student. supports clearing cookies.

// clear cookies when details.php?clear=yes is visited
if (isset($_GET["clear"])) {
  // set expired cookie to remove it
  setcookie("student_name", "", time() - 3600);
  setcookie("student_track", "", time() - 3600);

  // also unset from current script runtime (so UI updates immediately)
  unset($_COOKIE["student_name"]);
  unset($_COOKIE["student_track"]);
}

// read cookies (fallback values)
$name = $_COOKIE["student_name"] ?? "guest";
$track = $_COOKIE["student_track"] ?? "undecided";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Your Details — EPCC Mini-Hackathon</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <main class="container">
    <h1>Welcome back, <?= htmlspecialchars($name) ?>!</h1>

    <div class="card">
      <p><strong>Your track:</strong> <?= htmlspecialchars($track) ?></p>
      <p>Cookies let us remember you for a week. Open DevTools → Application/Storage → Cookies to inspect them.</p>
    </div>

    <div class="actions">
      <a class="btn" href="index.html">Home</a>
      <a class="btn ghost" href="register.php">Register (again)</a>
      <a class="btn ghost" href="details.php?clear=yes">Clear cookies</a>
    </div>

    <p class="muted">After clearing, refresh this page — you'll be treated as a guest.</p>
  </main>
</body>
</html>
