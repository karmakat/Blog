<aside>
                <ul>
                    <li>
                        <a href="add-post.php"><i class="icon-pencil-square-o"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="active"><i class="icon-dashboard2"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <?php
                        $aside_ad_user = '
                        <li>
                        <a href="add-user.php"><i class="icon-user-plus"></i>
                            <h5>Add Users</h5>
                         </a>
                        </li>
                        
                        ';
                        $aside_manage_user = '
                        <li>
                        <a href="manage-users.php"><i class="icon-users"></i>
                            <h5>Manage Users</h5>
                        </a>
                        </li>
                        ';
                        if($_SESSION['level']==1){
                            echo $aside_ad_user;
                            echo $aside_manage_user;
                        }else{
                            
                        }
                    ?>
                    
                    
                    <li>
                        <a href="add-category.php"><i class="icon-th-list"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php"><i class="icon-th"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                </ul>
            </aside>