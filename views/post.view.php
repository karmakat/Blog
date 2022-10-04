<?php 
require '../partials/header.php';
require '../processing/post.process.php';
if($data_posts){
    $title_post = $data_posts->title;
    $body_post = $data_posts->body;
    $category_post = $data_posts->category; 
    $created_at_post = $data_posts->created_at;
    $created_by_post = $data_posts->created_by;
    $img_post = $data_posts->thumbmail;
}else{
    redirect_the_user('home');
}

?>

    <section class="singlepost">
        <div class="container singlepost_container">
            <h2><?=$title_post?></h2>
            <div class="post_author">
                <div class="post_author-avatar">
                    <img src="../img/avatar.jpg" alt="">
                </div>
                <div class="post_author-info">
                    <h5><?=$created_by_post?></h5>
                    <small><?=$created_at_post?></small>
                </div>
            </div>

            <div class="singlepost_thumbmail">
                <img src="../img/posts_img/<?=$img_post?>" alt="">
            </div>
        <p><?=$body_post?></p>
    </div>
    </section>

    <?php require '../partials/footer.php'?>
</body>

</html>