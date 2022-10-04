<?php 
require '../partials/header.php';
require '../processing/category-posts.process.php';
?>

    <header class="category_title">
        <h2>Category Title</h2>
    </header>

    <section class="posts">
        <div class="container posts_container">
            <?php
            for ($i=0; $i < 6; $i++) { 
            ?>
            <article class="post">
                <div class="post_thumbmail">
                    <img src="../img/2.jpg" alt="">
                </div>
                <div class="post_info">
                    <a href="" class="category_button">Wild Life</a>
                    <h3 class="post_title">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <p class="post_body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem ratione obcaecati aperiam
                        soluta expedita cumque non ea sapiente adipisci? Sequi delectus dicta perspiciatis, nobis cumque
                        mollitia officiis incidunt quam aut!
                    </p>
                </div>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="../img/avatar.jpg" alt="">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Hnz Mas</h5>
                        <small>July 13, 2020 - 10:05</small>
                    </div>
                </div>
            </article>
            <?php } ?>
        </div>
    </section>

    <?php 
    require '../partials/categories.php';
    require '../partials/footer.php';
    ?>
</body>

</html>