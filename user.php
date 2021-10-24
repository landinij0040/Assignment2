<?php

include_once 'data_base_connect.php';
include_once 'button.php';
// Add Sign out button if user is signed in
// say must be logged in to accesses this page
// Users and admin can see

exist_signed_in();
button_on_click();

if (!$GLOBALS['is_signed_in']){
    echo 'You must be logged in to access this page';
}else{
    echo "Hello User";
}

show_button();


?>