<?php
require '../partials/header.php';
require '../processing/edit-post.process.php';
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <?php
        require '../config/_flash.php';
        require '../config/_errors.php';
        ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="txttitle" placeholder="Title" value="<?= $_GET['title'] ?>">
            <select name="txtcategory" id="">
                <?php while ($data = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <option value="<?= $data->title ?>"><?= $data->title ?></option>
                <?php } ?>
            </select>
            <textarea placeholder="Body" name="txtbody"><?= $result->body ?></textarea>
            <!-- <div class="form_control inline">
                    <input type="checkbox" name="" id="is_featured">
                    <label for="is_fatured" checked>Featured</label>
                </div> -->
            <div class="form_control">
                <label for="thumbmail">Add Thumbmail</label>
                <input type="file" name="thumbmail" id="thumbmail">
            </div>
            <button type="submit" name="submit" class="btn">Edit</button>
        </form>
    </div>
</section>

<?php require "../../../blog/partials/footer.php"; ?>
</body>

</html>