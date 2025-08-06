<form action="" method="post" class="form-edit-question">

    <div class="form-group">
        <a style="text-decoration: none; font-size: 32px;" onclick="return confirmBack()" href="profile.php">🡸</a>
    </div>
    
    <div class="form-group">
        <label for="username"><strong>Type your new username:</strong></label><br>
        <textarea name="username" rows="1" cols="60"><?= htmlspecialchars($users['username']) ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="email"><strong>Type your new email:</strong></label><br>
        <textarea name="email" rows="4" cols="60"><?= htmlspecialchars($users['email']) ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="location"><strong>Type your new location:</strong></label><br>
        <textarea name="location" rows="4" cols="60"><?= htmlspecialchars($users['location']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="password"><strong>Type your new password:</strong></label><br>
        <textarea name="password" rows="4" cols="60"><?= htmlspecialchars($users['password']) ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" onclick="return confirmUpdate()" value="Update your profile" class="btn">
    </div>

    <script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update?");}
    </script>
    <script>
    function confirmBack() {
        return confirm("Are you sure you want to back?");}
    </script>

</form>
