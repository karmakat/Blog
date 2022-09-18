<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body>

<?php
require_once('../includes/header.php');
?>
<div class="center">
    <h1>Admin</h1>
    <h3>Ajouter un article</h3>
    
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'add_article') {
            require_once('../includes/database.php');
            if(isset($_POST['submit'])){
                $titre = $_POST['titre'];
                $contenu = $_POST['contenu'];
                extract($_POST);
                // print_r($_FILES['fichier']);
                $content_dir = "images/";
                
                $tmp_file = $_FILES['fichier']['tmp_name'];
                if(!is_uploaded_file($tmp_file)){
                    exit("File not found");
                }
                $type_file = $_FILES['fichier']['type'];
                if(!strstr($type_file, 'jpeg') && !strstr($type_file, 'png')){
                    exit('this file is not an image');
                }
                
            
            $name_file = time().'.jpg';
            if(!move_uploaded_file($tmp_file, $content_dir.$name_file)){
                exit('can not copy the file');
            }
            $save_article = $db->prepare('INSERT INTO t_articles(titre,contenu,dateP,img) VALUES (?,?,now(),?)');
            $save_article->execute(array($titre, $contenu, $name_file));
            echo '<div class="alert alert-success alert-dismissible">
            
            <strong>Success!</strong> Indicates a successful or positive action.
          </div>';
        }
    ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="text">Titre:</label>
                    <input type="text" class="form-control" placeholder="Entrez le titre" name="titre">
                </div>
                
                <div class="form-group">
                    <label for="textarea">Contenu:</label>
                    <textarea class="form-control" placeholder="Entrez le contenu" name="contenu"></textarea>
                </div>
                
                <input type="file" name="fichier">
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
    <?php
        }
    }
    
    ?>
</div>

<?php
require_once('../includes/footer.php');
?>

    </body>
</html>