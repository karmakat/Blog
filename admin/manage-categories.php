<?php 
require 'partials/header.php';
redirect_the_user('manage-categories');
$query = "SELECT * FROM t_categories";
$stmt = $db->prepare($query);
$stmt->execute();
?>
<section class="dashboard">
    <div class="container dashboard_container">
       <button class="sidebar_toggle hide_sidebar-btn">
            <i class="icon-chevron-left"></i>
        </button>
        <button class="sidebar_toggle show_sidebar-btn">
            <i class="icon-chevron-right"></i>
        </button>
        <?php require 'partials/aside.php'?>
        <main>
            <h2>Manage Categories</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?=$data->title?></td>
                        <td><a href="edit-category.php?title=<?=$data->title?>" class="btn sm">Edit</a></td>
                        <td><a href="processing/delete-category.process.php?title=<?=$data->title?>" class="btn sm danger">Delete</a></td>
                    </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

</section>