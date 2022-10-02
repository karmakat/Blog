<?php 
require 'partials/header.php';
require 'processing/add-category.process.php';
?>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
            <?php 
            require 'config/_errors.php';
            require 'config/_flash.php';
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="txttitle" placeholder="Title" value="<?=get_input_data('txttitle')?>">
                <textarea placeholder="Description" name="txtdescription"></textarea>
                <button type="submit" class="btn" name="add">Add Category</button>
            </form>
        </div>
    </section>
    

    <?php require "../../blog/partials/footer.php";?>
</body>

</html>