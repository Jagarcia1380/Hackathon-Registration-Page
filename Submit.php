<?php
// submit.php - process form, set cookies, append registration to file, and show thank-you page

// 3A. Get form values (match input name="")
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$track = $_POST["track"] ?? "";
$shirt = $_POST["shirt"] ?? "";
$laptop = isset($_POST["laptop"]) ? "yes" : "no";

// simple trimming (optional)
$name = trim($name);
$email = trim($email);
$track = trim($track);
$shirt = trim($shirt);

// 3B. Set cookies (must be before any output)
setcookie("student_name", $name, time() + 60*60*24*7); // 7 days
setcookie("student_track", $track, time() + 60*60*24*7);

// 3C. Write to a file (comma-separated line)
$line = $name . "," . $email . "," . $track . "," . $shirt . "," . $laptop . "\n";

$file_path = "registrations.txt";

// attempt to open and append
if ($f = fopen($file_path, "a")) {
    fwrite($f, $line);
    fclose($f);
    $written = true;
} else {
    $written = false;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Thanks — EPCC Mini-Hackathon</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <main class="container">
    <h1>Thank you!</h1>

    <?php if ($written): ?>
      <p class="lead">
        Thanks, <strong><?= htmlspecialchars($name) ?></strong>! You're registered for the
        <strong><?= htmlspecialchars($track) ?></strong> track.
      </p>
      <p>
        A confirmation has been recorded. You can view your details or go back to the home page.
      </p>
    <?php else: ?>
      <p class="lead">There was an error saving your registration. Please try again later.</p>
    <?php endif; ?>

    <div class="actions">
      <a class="btn" href="details.php">View your details</a>
      <a class="btn ghost" href="index.html">Back to Home</a>
      <a class="btn ghost" href="admin.php">Admin: View Registrations</a>
    </div>

    <p class="muted">Tip: open DevTools → Application/Storage → Cookies to see <code>student_name</code> and <code>student_track</code>.</p>
  </main>
</body>
</html>
