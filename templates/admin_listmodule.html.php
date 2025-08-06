<h2>Modules List</h2>
<p>There are recently <?= $totalModules?> modules on the system</p>

<table class="module-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Module Name</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($modules as $module): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($module['Modulename'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><a href="editmodule.php?id=<?= $module['ModuleID'] ?>" class="btn">Edit</a></td>
            <td>
                <div style="margin-top: 10px;">
                    <form action="deletemodule.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="ModuleID" value="<?= $module['ModuleID'] ?>">
                        <input type="submit" value="Delete" class="btn" onclick="return confirmUpdate()" style="background-color: #732F29;">            
                    </form>
                </div>
            </td>
        </tr>
        <script>
    function confirmUpdate() {
    return confirm("Are you sure you want to delete?");
}
</script>
        <?php endforeach; ?>
    </tbody>
</table>
