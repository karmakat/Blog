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
<?php
include('includes/header.php');
?>

<div class="center">
    <br><br>
    <h2>Details</h2>
    <div class="all-articles">
        <div class="card mb-3" style="max-width: 540px;">
        <?php
        require_once('includes/database.php');
        $titre = $_GET['titre'];
        $req = $db->prepare("SELECT * FROM t_articles WHERE titre='$titre'");
        $req->execute();
        while ($reponse = $req->fetch(PDO::FETCH_OBJ)) { 
            $contenu = $reponse->contenu;
            $img = $reponse->img;
        }?>
            <div class="col-md-4">
                <img src="admin/images/<?php echo $img?>" alt="" class="card-img">
            </div>
           
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                    <?php echo $_GET['titre']?>
                    </h5>
                    <p class="card-text">
                    <?php echo $contenu?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Last update:  <?php //echo $strdate?> </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>