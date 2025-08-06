<form action="" method="post" enctype="multipart/form-data" class="form-edit-question">

    <input type="hidden" name="questionID" value="<?= $questions['questionID']; ?>">

    <div class="form-group">
        <label for="Title"><strong>Type your new title:</strong></label><br>
        <textarea name="Title" rows="1" cols="60"><?= htmlspecialchars($questions['Title']) ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="content"><strong>Type your new content:</strong></label><br>
        <textarea name="content" rows="4" cols="60"><?= htmlspecialchars($questions['content']) ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="ModuleID"><strong>Select a module:</strong></label><br>
        <select name="ModuleID" required>
            <option value="">-- Select a module --</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?= (int)$module['ModuleID'] ?>" <?= ($questions['ModuleID'] == $module['ModuleID']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($module['Modulename']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="fileToUpload"><strong>Upload new image (optional):</strong></label><br>
        <input type="file" name="fileToUpload">
    </div>

    <div class="form-group">
        <label><strong>Current image:</strong></label><br>
        <?php if (!empty($questions['image'])): ?>
            <img src="/COMP1841/coursework/uploads/<?= htmlspecialchars($questions['image']) ?>" 
                 alt="Current image"
                 style="max-width:300px; max-height:200px; border: 1px solid #ccc; margin-top: 5px;">
        <?php else: ?>
            <p><em>No image uploaded.</em></p>
        <?php endif; ?>
    </div>

    

    

    <div class="form-group">
        <input type="submit" name="submit" onclick="return confirmUpdate()" value="Update your question" class="btn">
    </div>

    <script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update?");
}
</script>

</form>
