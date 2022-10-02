<?php 
require 'partials/header.php';
require 'processing/add-user.process.php';
?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add User</h2>

            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" placeholder="First Name">
                <input type="text" name="" placeholder="Last Name">
                <input type="text" name="" placeholder="Username">
                <input type="email" name="" placeholder="Email">
                <input type="password" name="" placeholder="Create Password">
                <input type="password" name="" placeholder="Confirm Password">
                <select name="" id="">
                    <option value="0">Admin</option>
                    <option value="1">Author</option>
                </select>
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

    <?php include "../../blog/partials/footer.php";?>
</body>

</html>