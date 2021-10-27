<?php

include_once 'data_base_connect.php';
include_once 'button.php';
// Add Sign out button if user is signed in
// say must be logged in to accesses this page
// Users and admin can see


//session_start();
exist_signed_in();
button_on_click();


if (!$_SESSION['is_signed_in']){
    echo '<h1>You must be logged in to access this page</h1>';
}else{
    echo "<h1>Hello User</h1>";
}

show_button();


?>