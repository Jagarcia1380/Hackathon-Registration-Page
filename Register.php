<?php
// register.php - shows the registration form
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — EPCC Mini-Hackathon</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <main class="container">
    <h1>Register for Mini-Hackathon Day</h1>

    <form method="POST" action="submit.php" class="card form-card">
      <label>
        Name
        <input type="text" name="name" required placeholder="Your full name" />
      </label>

      <label>
        EPCC Email
        <input type="email" name="email" required placeholder="you@epcc.edu" />
      </label>

      <label>
        Track choice
        <select name="track" required>
          <option value="Web">Web</option>
          <option value="Cyber">Cyber</option>
          <option value="Data">Data</option>
          <option value="Other">Other</option>
        </select>
      </label>

      <label>
        T-Shirt size
        <select name="shirt" required>
          <option value="S">S</option>
          <option value="M" selected>M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
        </select>
      </label>

      <label class="checkbox">
        <input type="checkbox" name="laptop" />
        I need a loaner laptop
      </label>

      <div class="form-actions">
        <button class="btn" type="submit">Submit Registration</button>
        <a class="btn ghost" href="index.html">Back to Home</a>
      </div>
    </form>

    <p class="muted">Form submits via POST to <code>submit.php</code>.</p>
  </main>
</body>
</html>
