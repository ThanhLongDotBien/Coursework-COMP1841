<div class="form-create-question">
  <h2>Log In</h2>
  <form action="login.php" method="post">
    


    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
    </div>
    
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
    </div>
    
    <?php
    if (isset($_SESSION['error'])) {
      echo '<div style="color: red; margin-bottom: 10px;">' . $_SESSION['error'] . '</div>';
      unset($_SESSION['error']);
    }
    ?>
    
    <div class="form-group">
      <button type="submit" class="btn">Log In</button>
    </div>

  </form>
  <p class="text-center">
    Don't have an account? <a href="signup.php">Sign up</a>
  </p>
</div>
