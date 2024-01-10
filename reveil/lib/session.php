<?php
function flash($message= 'success'){
//, $type 
    if(isset($_SESSION['Flash'])){
        extract($_SESSION['Flash']);
        unset($_SESSION['Flash']);
        return "";//"<div class='pop'><header class='good'><h1 class='type'> Success </h1></header><p class='alert'>$message</p> <footer><div class='stop'><ion-icon name='checkmark-done-outline'></ion-icon></div></footer></div>";
    }
}

function setflash($message = 'success'){
    $_SESSION['Flash']['message'] = $message;
    //$_SESSION['Flash']['type'] = $type;
}