<?php

    include_once 'data_base_connect.php';
    include_once 'button.php';
//    session_start();
    echo "<script>console.log('In php main')</script>";
    // If not signed in have button go to the signin page
    // Add Sign out button if user is signed in
    // Can be accessed by all vistors

    // Check if $_SESSIONS['is_signed_in'] exists
    exist_signed_in();

    // Check if $_SESSIONS['is_signed_in'] exists
    exist_admin();

    // Check if there was a POST request
    button_on_click();

    // Seeing if the user is signed in
    $signed_in_text = "";
    if ($_SESSION['is_signed_in']) {
        $signed_in_text = "";
    }else{
        $signed_in_text = "not";
    }

    if($_SESSION['is_admin']){
        $signed_in_text = 'admin';
    }

    // Echoing the contents of the mainpage.php
    echo"<h1>You are $signed_in_text signed in</h1>";
    show_button();



?>