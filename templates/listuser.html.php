<h2>List of Users</h2>
<p>There are currently <?=$totalUsers?> users on the system</p>
<table class="user-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Location</th>
            <th>User Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($users as $user): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['location'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><a href="userdetail.php?id=<?= $user['userID'] ?>">View Profile</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
