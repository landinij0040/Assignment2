<?php

// firstname
// last name
// username
// time of creation
// time of last log out
// Usernames should be unique
// Make an account admin with cred
//   admin
//   nimda21
// Make one user account
// Globals

//$GLOBALS['is_signed_in'] = false;
//$GLOBALS['is_admin'] = false ;

function exist_signed_in(){
    if ( ! array_key_exists('is_signed_in',$GLOBALS)){
        $GLOBALS['is_signed_in'] = false;
    }

}

function connect_to_db()
{
    $host = "cssrvlab01.utep.edu";
    $db = "ijlandin_f21_db";
    $username = "ijlandin";
    $password = "*utep2021!";

    $conn = new mysqli($host, $username, $password, $db);

    $GLOBALS['conn'] = $conn;


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
connect_to_db();