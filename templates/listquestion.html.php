<h2>List of Questions</h2>
<p class="text-muted">
  There are currently <?= $totalQuestions ?> questions displayed on the system.
</p>

<!-- Search Form -->
<div class="form-create-question mb-4">
  <form method="get" action="search.php" class="row g-2 align-items-center">
    <div class="col">
      <input
        type="text"
        name="search"
        class="form-control"
        placeholder="Search by keyword..."
        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES) : '' ?>"
      >
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>
</div>

<main class="container">
  <div class="row justify-content-center gy-4">
    <?php if (empty($questions)): ?>
      <div class="col-lg-8">
        <div class="alert alert-warning text-center">
          No questions found matching the keyword
          “<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) ?>”.
        </div>
      </div>
    <?php else: ?>
      <?php foreach ($questions as $question): ?>
        <div class="col-lg-8 col-md-10">
          <div class="card-custom">
            <h3 class="mb-2">
              <strong>Title:</strong>
              <?= htmlspecialchars($question['Title'], ENT_QUOTES, 'UTF-8') ?>
              <span class="text-muted small">
                (<?= htmlspecialchars($question['Modulename'], ENT_QUOTES, 'UTF-8') ?>)
              </span>
            </h3>

            <p><strong>Content:</strong><br>
              <?= nl2br(htmlspecialchars($question['content'], ENT_QUOTES, 'UTF-8')) ?>
            </p>

            <?php if (!empty($question['image'])): ?>
              <p><strong>Question Image:</strong></p>
              <img
                src="/COMP1841/coursework/uploads/<?= htmlspecialchars($question['image']) ?>"
                alt="Uploaded Image"
                class="img-fluid rounded mb-3 question-image"
              >
            <?php endif; ?>

            <div class="question-meta text-muted mb-3">
              <?php $date = date("D d M Y", strtotime($question['questiondate'])) ?>
              <small>
                Post at <?= htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?> 
                by <a href="listuser.php"><?= htmlspecialchars($question['username'], ENT_QUOTES, 'UTF-8') ?></a>
              </small>
            </div>

            <?php if (isset($_SESSION['userID']) && $_SESSION['userID']==$question['userID']): ?>
              <a href="editquestion.php?id=<?= $question['questionid'] ?>" class="btn btn-sm btn-outline-primary me-2">Edit</a>
              <form action="deletequestion.php" method="post" class="d-inline">
                <input type="hidden" name="questionid" value="<?= $question['questionid'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-danger" style="background-color: #732F29;" onclick="return confirm('Are you sure you want to delete this question?');">Delete</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</main>
