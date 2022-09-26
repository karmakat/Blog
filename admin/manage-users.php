<?php include 'partials/header.php';?>

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
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ernest</td>
                        <td>rs46</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Ernest</td>
                        <td>rs46</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Ernest</td>
                        <td>rs46</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                    
                </tbody>
            </table>
        </main>
    </div>    
</section>