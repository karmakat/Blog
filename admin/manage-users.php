<?php 
require 'partials/header.php';
redirect_the_user('manage-users');
$query = "SELECT * FROM t_admins";
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
                <?php
                    while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?=$data->firstname.' '.$data->lastname?></td>
                        <td><?=$data->username?></td>
                        <td><a href="edit-user.php?username=<?=$data->username?>" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.php?username=<?=$data->username?>" class="btn sm danger">Delete</a></td>
                        <td><?php
                        if($data->level == 1){
                            echo 'Yes';
                        }else{
                            echo 'No';
                        }
                        ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </main>
    </div>    
</section>