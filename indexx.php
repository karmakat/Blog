<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body>
<?php require_once('includes/header.php');
?>
<div class="center">
    <h3>Nos articles</h3>
    <div class="all-articles">
        <?php
        require_once('includes/database.php');
        $req = $db->prepare('SELECT * FROM t_articles');
        $req->execute();
        while ($reponse = $req->fetch(PDO::FETCH_OBJ)) { ?>
            <div class="card" style="width: 18rem;">
                <img src="admin/images/<?php echo $reponse->img?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $reponse->titre?></h5>
                    <p class="card-text"><?php echo substr($reponse->contenu, 0,50).'...';?></p>
                    <p class="card-text">
                        <!--
                        <small class="text-muted">Last update : <?php //echo $reponse->datePub?></small>
                        -->
                    </p>
                    <a href="plus.php?titre=<?php echo $reponse->titre?>" class="btn btn-primary">Plus</a>
                </div>
            </div>
            <br><br>
        <?php
        }
        ?> 
    </div>
</div>
    </body>
</html>