<?php

    include_once 'data_base_connect.php';
    include_once 'button.php';
    // If not signed in have button go to the signin page
    // Add Sign out button if user is signed in
    // Can be accessed by all vistors



    // Check if $GLOBALS['is_signed_in'] exists
    exist_signed_in();

    // Check if there was a POST request
    button_on_click();
    // Seeing if the user is signed in
    $signed_in_text = "";
    if ($GLOBALS['is_signed_in']){
        $signed_in_text = "";
    }else{
        $signed_in_text = "not";
    }

    // Echoing the contents of the mainpage.php
    echo"<h1>You are $signed_in_text signed in</h1>";
    show_button();



?>