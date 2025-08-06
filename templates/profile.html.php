<h2>Profile</h2>
<main class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card-custom">
        <p><strong>Name:</strong> <?= htmlspecialchars($user['username']) ?></p>
        
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($user['location']) ?></p>
        <h3 class="mt-4">Your Questions</h3>
<ul>
  <?php foreach ($questions as $q): ?>
    <li>
      <strong><?= htmlspecialchars($q['Title']) ?></strong><br>
      <?= htmlspecialchars($q['content']) ?>
    </li>
  <?php endforeach; ?>
</ul>

        
        <a href="editprofile.php" class="btn btn-primary mt-3">Edit Profile</a>
      </div>
    </div>
  </div>
</main>
