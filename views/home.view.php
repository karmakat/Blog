<?php 
require '../partials/header.php';
require '../processing/home.process.php';
?>

    <section class="featured">
        <div class="container featured_container">
            <div class="post_thumbmail">
                <img src="../img/1.jpg" alt="">
            </div>
            <div class="post_info">
                <a href="category-posts.view.php" class="category_button">Wild Life</a>
                <h2 class="post_title">
                    <a href="post.view.php">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</a>
                </h2>
                <p class="post_body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus necessitatibus ratione
                    praesentium excepturi ut, unde molestias fugiat cum doloribus minus corrupti aspernatur? Sunt
                    accusamus deserunt cum blanditiis quam minima maxime.
                </p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="../img/avatar.jpg" alt="">
                    </div>
                    <div class="post_author-info">
                        <h5>By Trez Kit</h5>
                        <small>June 10, 2021 - 09:44</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="posts">
        <div class="container posts_container">
            <?php 
           
            while($data_home = $stmt->fetch(PDO::FETCH_OBJ)){
                for ($i=0; $i < 3; $i++) { 
                ?>
            <article class="post">
                <div class="post_thumbmail">
                    <img src="../img/posts_img/<?=$data_home->thumbmail?>" alt="">
                </div>
                <div class="post_info">
                    <a href="category-posts.view.php?category=<?=$data_home->category?>" class="category_button"><?=$data_home->category?></a>
                    <h3 class="post_title">
                        <a href="post.view.php?title=<?=$data_home->title?>">
                            <?=$data_home->title?>
                        </a>
                    </h3>
                    <p class="post_body">
                    <?=substr($data_home->body, 0,200).'...'?>
                    </p>
                </div>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="../img/avatar.jpg" alt="">
                    </div>
                    <div class="post_author-info">
                        <h5>By: <?=$data_home->created_by?></h5>
                        <small><?=$data_home->created_at?></small>
                    </div>
                </div>
            </article>
            <?php } } ?>

        </div>
    </section>
    <?php 
    require '../partials/categories.php';
    require '../partials/footer.php';
    ?>
</body>

</html>