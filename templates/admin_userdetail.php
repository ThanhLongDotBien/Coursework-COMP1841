<main class="container mt-4">
  
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card-custom">
      <a style="text-decoration: none; font-size: 32px;" onclick="return confirmBack()" href="listuser.php">🡸</a>  
      <p><strong>Name:</strong> <?= htmlspecialchars($user['username']) ?></p>
        
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($user['location']) ?></p>
        <h3 class="mt-4">User Questions</h3>
<ul>
  <?php foreach ($questions as $q): ?>
    <li>
      <strong><?= htmlspecialchars($q['Title']) ?></strong><br>
      <?= htmlspecialchars($q['content']) ?>
    </li>
  <?php endforeach; ?>
</ul>
        
    
        
      </div>
    </div>
  </div>
<script>
    function confirmBack() {
        return confirm("Are you sure you want to back?");}
    </script>
</main>
