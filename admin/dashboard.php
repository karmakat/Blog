<?php
require 'partials/header.php';
require 'processing/dashboard.process.php';
?>
<section class="dashboard">
    <div class="container dashboard_container">
        <button class="sidebar_toggle hide_sidebar-btn">
            <i class="icon-chevron-left"></i>
        </button>
        <button class="sidebar_toggle show_sidebar-btn">
            <i class="icon-chevron-right"></i>
        </button>
        <?php require 'partials/aside.php' ?>
        <main>
            <h2>Manage Posts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Select all posts
                    $query = "SELECT * FROM t_posts";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    while ($data = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                        <tr>
                            <td><?= $data->title ?></td>
                            <td><?= $data->category ?></td>
                            <td><a href="edit-post.php?title=<?= $data->title ?>" class="btn sm">Edit</a></td>
                            <td><a href="processing/delete-post.process.php?title=<?= $data->title ?>" class="btn sm danger">Delete</a></td>
                        </tr>
                    <?php } ?>
            </table>
        </main>
    </div>
</section>