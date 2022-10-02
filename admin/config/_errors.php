<?php
if(isset($errors)){
    if(count($errors) 
    !=0){
    echo  '<div class="alert_message error">';
        foreach($errors as $error){
            echo $error.'<br/>';
        }
    echo '</div>';
    }
}
                