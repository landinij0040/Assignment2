<?php

include_once 'data_base_connect.php';
include_once 'button.php';
// Add Sign out button if user is signed in
// say must be logged in to accesses this page
// Users and admin can see


//session_start();
exist_signed_in();
button_on_click();


// Checking if there was a request to change the users password
if(array_key_exists('user_change_password',$_POST)){
    if($_POST['new_password'] != ""){
        $column = password_hash($_POST['new_password'] .'hashbrowns', PASSWORD_DEFAULT );
        $user = $_SESSION['current_user'];
        $query = "UPDATE user SET password='$column' WHERE username='$user' ";
        $_SESSION['conn']->query($query);
    }
}

if (!$_SESSION['is_signed_in']){
    echo '<h1>You must be logged in to access this page</h1>';
}else{
    show_user();
    echo <<< _END
    <br>
    <br>
    <form method="POST" action="user.php">
        New Password <input type="text" name="new_password">
        <br/>
        <input type="submit" name="user_change_password">
    </form> 
    <br>
_END;
}

show_button();


?>