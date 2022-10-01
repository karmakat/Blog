<?php if(isset($_SESSION['notification']['message'])):?>

<div class="alert_message <?php echo $_SESSION['notification']['type']?>">
    <h6><?php echo $_SESSION['notification']['message']?></h6>
</div>
<?php $_SESSION['notification'] = [];?>
<?php endif;?>

