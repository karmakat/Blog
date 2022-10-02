<?php 
require 'partials/header.php';
require 'processing/edit-category.process.php';
?>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Category</h2>
            <?php 
            require 'config/_errors.php';
            require 'config/_flash.php';
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="txttitle" value="<?=$_GET['title']?>" placeholder="Title">
                <textarea placeholder="Description" name="txtdescription"></textarea>
                <button type="submit" class="btn" name="update">Update Category</button>
            </form>
        </div>
    </section>

    <?php require "../../blog/partials/footer.php";?>
</body>

</html>