<?php include 'partials/header.php';?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Post</h2>

            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" placeholder="Title">
                <select name="" id="">
                    <option value="1">Travel</option>
                    <option value="1">Art</option>
                    <option value="1">Science & Technology</option>
                </select>
                <textarea placeholder="Body"></textarea>
                <div class="form_control inline">
                    <input type="checkbox" name="" id="is_featured">
                    <label for="is_fatured" checked>Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbmail">Add Thumbmail</label>
                    <input type="file" name="" id="thumbmail">
                </div>
                <button type="submit" class="btn">Add Category</button>
            </form>
        </div>
    </section>

    <?php include "../../blog/partials/footer.php";?>
</body>

</html>