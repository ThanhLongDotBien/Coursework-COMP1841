<div class="form-create-question">
  <h2>Sign Up</h2>
  <form action="signup.php" method="post">
    
    <div class="form-group">
      <label for="username">Username</label>
      <input 
        type="text" 
        id="username" 
        name="username" 
        class="form-control" 
        placeholder="Enter your username" 
        required
      >
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control" 
        placeholder="name@example.com" 
        required
      >
    </div>

    <div class="form-group">
        <label for="location">Where are you form?</label>
        <input type="text" id="location" name="location" placeholder="Viet Nam" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input 
        type="password" 
        id="password" 
        name="password" 
        class="form-control" 
        placeholder="••••••••" 
        required
      >
    </div>

    <div class="form-group">
      <button type="submit" class="btn">Sign Up</button>
    </div>

  </form>
  <p class="text-center">
    Already have an account? <a href="login.php">Log in</a>
  </p>
</div>
