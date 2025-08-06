<h2>Ask question</h2>
<form action="addquestion.php" method="post" enctype="multipart/form-data" class="form-create-question">

    <div class="form-group">
        <label for="Title"><strong>Add your title here:</strong></label>
        <textarea name="Title" rows="1" cols="60" required></textarea>
    </div>

    <div class="form-group">
        <label for="content"><strong>Add your content here:</strong></label>
        <textarea name="content" rows="4" cols="60" required></textarea>
    </div>

    <div class="form-group">
        <label for="fileToUpload"><strong>Upload an image:</strong></label>
        <input type="file" name="fileToUpload">
    </div>

    <div class="form-group">
        <label for="modules"><strong>Select a module:</strong></label>
        <select name="modules" required>
            <option value="">-- Select a module --</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?= htmlspecialchars($module['ModuleID']) ?>">
                    <?= htmlspecialchars($module['Modulename']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" onclick="return confirmAdd()" value="Add Question" class="btn">
    </div>

    <script>
    function confirmAdd() {
    return confirm("Are you sure you want to update");
    }
    </script>

</form>
