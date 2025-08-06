<h2>Email List</h2>
<p>There are recently <?= $totalContacts?> emails were sent by users</p>
<main class="container mt-4">
  <div class="row justify-content-center gy-4">
    <?php foreach ($contacts as $contact): ?>
      <div class="col-lg-8 col-md-10">
        <div class="card-custom">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <strong><?= htmlspecialchars($contact['username'], ENT_QUOTES, 'UTF-8') ?></strong>
            <small class="text-muted">
              <?= date("D d M Y", strtotime($contact['emaildate'])) ?>
            </small>
            <form action="deletemail.php" method="post" style="display: inline-block;">
                <input type="hidden" name="contactID" value="<?= $contact['contactID'] ?>">
                <input type="submit" value="Delete" class="btn" onclick="return confirmUpdate()" style="background-color: #732F29;">
            </form>
          </div>
          <p><?= nl2br(htmlspecialchars($contact['content'], ENT_QUOTES, 'UTF-8')) ?></p>
        </div>
        <script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update?");
}
</script>
      </div>
    <?php endforeach; ?>
  </div>
</main>
