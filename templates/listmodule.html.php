<h2>Modules List</h2>
<p>There are recently <?= $totalModules?> modules on the system</p>
<table class="module-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Module Name</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($modules as $module): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($module['Modulename'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
