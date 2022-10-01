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
            <?php require 'partials/aside.php'?>
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
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>

                    </tbody>
                </table>
            </main>
        </div>
    </section>