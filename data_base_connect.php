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

// Checks to see i
session_start();
function exist_signed_in(){
    if ( ! array_key_exists('is_signed_in',$_SESSION)){
        echo "<script>console.log('Does NOt Esits?')</script>" ;
        $_SESSION['is_signed_in'] = false;
    }
    else{
        echo "<script>console.log('is_signed_in Does Exists ')</script>";
    }
}

function exist_admin(){
    if ( ! array_key_exists('is_admin',$_SESSION)){
        $_SESSION['is_admin'] = false;
    }
}

function user_exists($user,$password){
    $query = "SELECT * FROM user WHERE username ='". $user ."'";
    $result = $_SESSION['conn']->query($query);
    if($result){
        while($row = $result->fetch_row()){
            // TODO make re hashing for passwrod
            if(password_verify($password . 'hashbrowns', $row[1])){ // Checking of the password matches
                // Signing in
                $_SESSION['is_signed_in'] = True;
                // Putting time last signed
                $_SESSION['conn']->query("UPDATE user SET lastlogin=CURRENT_TIMESTAMP WHERE username='$row[0]' ");
                // Setting admin to true if true
                $_SESSION['is_admin'] = $row[6];
                // Putting the capturing te username
                $_SESSION['current_user'] = $row[0];
            }
            else{
                echo "Password is not correct";
            }

        }
    }else{
        echo "User name is not correct";
    }
}


function show_user(){
    $current_user =  $_SESSION['current_user'];
    $query = "SELECT * FROM user WHERE username= '$current_user' ";
    $result = $_SESSION['conn']->query($query);
    $rows = $result->fetch_row();

    echo "<h2>Hello $rows[0]!</h2><br/>";
    echo "Username: $rows[0]<br/>";
    echo "Password: $rows[1] <br/>";
    echo "Firstname: $rows[2]<br/>";
    echo "Lastname: $rows[3] <br/>";
    echo "Created: $rows[4] <br/>";
    echo "LastLogin: $rows[5]<br/>";
    echo "Admin: $rows[6]";

}

function show_users()
{
    $query = "SELECT * FROM user";
    $result = $_SESSION['conn']->query($query);

    echo "<h1>Users</h1>";

    while ($rows = $result->fetch_row()) {
        echo "<h2>$rows[0]!</h2><br/>";
        echo "Username: $rows[0]<br/>";
        echo "Password: $rows[1] <br/>";
        echo "Firstname: $rows[2]<br/>";
        echo "Lastname: $rows[3] <br/>";
        echo "Created: $rows[4] <br/>";
        echo "LastLogin: $rows[5]<br/>";
        echo "Admin: $rows[6]";
    }
}


function connect_to_db()
{
    $host = "cssrvlab01.utep.edu";
    $db = "ijlandin_f21_db";
    $username = "ijlandin";
    $password = "*utep2021!";

    $conn = new mysqli($host, $username, $password, $db);

    $_SESSION['conn'] = $conn;


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
connect_to_db();


