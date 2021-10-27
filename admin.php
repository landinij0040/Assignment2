<?php
    include_once 'data_base_connect.php';
    include_once 'button.php';
    // make form for
    //      new user
    //      New password
    // see a list of the current user/ maybe table to update probably passwords and username
    // Savig Password
    //     Use Hash
    //     add salt
    //      password_hash($password, PASSWORD_DEFAULT)
    //      password verify
    //      salting
    //      password_hash(antirainbow.$password, PASSWORD_DEFAULT)
    if (!$_SESSION['is_signed_in']){
        echo '<h1>You must be an admin to acces this page</h1>';
    }else{
        show_users();

    }
    show_button();

?>