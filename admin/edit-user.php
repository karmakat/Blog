<?php 
require 'partials/header.php';
require 'processing/edit-user.process.php';
?>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit User</h2>
            <?php 
            require 'config/_errors.php';
            require 'config/_flash.php';
            ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="txtfirstname" value="<?=$firstname?>" placeholder="First Name">
                <input type="text" name="txtlastname" value="<?=$lastname?>" placeholder="Last Name">
                <select name="txtlevel" id="">
                    <option value="1">Admin</option>
                    <option value="2">Author</option>
                </select>
                <button type="submit" class="btn" name="update">Update User</button>
            </form>
        </div>
    </section>

    <?php require "../../blog/partials/footer.php";?>
</body>

</html>