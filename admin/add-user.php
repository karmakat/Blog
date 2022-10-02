<?php
require 'partials/header.php';
require 'processing/add-user.process.php';
?>
<section class="form_section">
    <div class="container form_section-container">
        <h2>Add User</h2>
        <?php 
        require 'config/_errors.php';
        require 'config/_flash.php';
        ?>
        <form autocomplete="off" enctype="multipart/form-data" method="POST">
            <input type="text" name="txtfirstname" value="<?= get_input_data('txtfirstname') ?>" placeholder="First Name" id="txtfirstname">
            <input type="text" name="txtlastname" value="<?= get_input_data('txtlastname') ?>" placeholder="Last Name" id="txtlastname">
            <input type="text" name="txtusername" value="<?= get_input_data('txtusername') ?>" placeholder="Username" id="txtusername">
            <input type="email" name="txtemail" value="<?= get_input_data('txtemail') ?>" placeholder="Email" id="txtemail">
            <input type="password" name="txtpassword" placeholder="Create Password" id="txtpassword">
            <input type="password" name="txtconfirm" placeholder="Confirm Password" id="txtconfirm">
            <select name="txtlevel">
                <option value="1">Admin</option>
                <option value="2">Editor</option>
            </select>
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" class="btn" name="submit">Add User</button>
        </form>
    </div>
</section>

<?php include "../../blog/partials/footer.php"; ?>
</body>

</html>