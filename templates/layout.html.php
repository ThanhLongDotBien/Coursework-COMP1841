<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="layout.css">
    <title><?=$title?></title>
</head>
<body>
    <header><h1>Welcome to DevLife</h1></header>
  <nav> 
    <div class="custom-navbar">
    <div class="navbar-brand">
      <a href="index.php">DevLife</a>
    </div>

    <ul class="navbar-menu">
      <li><a href="listquestion.php">Questions</a></li>
      <li><a href="listuser.php">Users</a></li>
      <li><a href="listmodule.php">Modules</a></li>
      <li><a href="addquestion.php">Ask question</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="profile.php">Profile</a></li>
    </ul>

    <div class="navbar-auth">
      <?php if (isset($_SESSION['userID'])): ?>
        <a class="btn btn-success" onclick="confirmLogout()" href="logout.php">Log Out</a>
      <?php else: ?>
        <a class="btn btn-success" href="signup.php">Sign Up</a>
        <a class="btn btn-primary" href="login.php">Log In</a>
      <?php endif; ?>
    </div>
      </nav>
    <main>
        <?=$output?>
    </main>
    <script>
function confirmLogout() {
  if (confirm("Are you sure you want to log out?")) {
    window.location.href = "logout.php";
  }
}
</script>
    <footer>&copy; IJDB 2023</footer>
</body>
</html>