<?php
require '../partials/header.php';
require '../processing/home.process.php';

$id = random_int(0, 4);
$query_one = "SELECT * FROM t_posts WHERE id=?";
$stmt_one = $db->prepare($query);
$stmt_one->execute([$id]);
$data_one = $stmt_one->fetch(PDO::FETCH_OBJ);

$title_post = $data_one->title;
$body_post = $data_one->body;
$category_post = $data_one->category;
$created_at_post = $data_one->created_at;
$created_by_post = $data_one->created_by;
$img_post = $data_one->thumbmail;

// Look the author
$query_author = "SELECT * FROM t_admins WHERE username=?";
$stmt_author = $db->prepare($query_author);
$stmt_author->execute([$created_by_post]);
$data_author = $stmt_author->fetch(PDO::FETCH_OBJ);
$img_author = $data_author->avatar;
$firstname_author = $data_author->firstname;
$lastname_author = $data_author->lastname;
?>

<section class="featured">
    <div class="container featured_container">
        <div class="post_thumbmail">
            <img src="../img/posts_img/<?= $img_post ?>" alt="">
        </div>
        <div class="post_info">
            <a href="category-posts.view.php?category=<?= $category_post ?>" class="category_button"><?= $category_post ?></a>
            <h2 class="post_title">
                <a href="post.view.php?title=<?= $title_post ?>"><?= $title_post ?></a>
            </h2>
            <p class="post_body">
                <?= substr($body_post, 0, 200) . '...' ?>
            </p>
            <div class="post_author">
                <div class="post_author-avatar">
                    <img src="../img/admins_img/<?= $img_author ?>" alt="">
                </div>
                <div class="post_author-info">
                    <h5><?= $firstname_author . ' ' . $lastname_author ?></h5>
                    <small><?= $created_at_post ?></small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="posts">
    <div class="container posts_container">
        <?php

        while ($data_home = $stmt->fetch(PDO::FETCH_OBJ)) {
            for ($i = 0; $i < 3; $i++) {
        ?>
                <article class="post">
                    <div class="post_thumbmail">
                        <img src="../img/posts_img/<?= $data_home->thumbmail ?>" alt="">
                    </div>
                    <div class="post_info">
                        <a href="category-posts.view.php?category=<?= $data_home->category ?>" class="category_button"><?= $data_home->category ?></a>
                        <h3 class="post_title">
                            <a href="post.view.php?title=<?= $data_home->title ?>">
                                <?= $data_home->title ?>
                            </a>
                        </h3>
                        <p class="post_body">
                            <?= substr($data_home->body, 0, 200) . '...' ?>
                        </p>
                    </div>
                    <div class="post_author">
                        <div class="post_author-avatar">
                            <img src="../img/admins_img/<?= $img_author ?>" alt="">
                        </div>
                        <div class="post_author-info">
                            <h5>By: <?= $firstname_author . ' ' . $lastname_author ?></h5>
                            <small><?= $data_home->created_at ?></small>
                        </div>
                    </div>
                </article>
        <?php }
        } ?>

    </div>
</section>
<?php
require '../partials/categories.php';
require '../partials/footer.php';
?>
</body>

</html>