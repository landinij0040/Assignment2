

<?php
    include_once 'data_base_connect.php';
    include_once 'button.php';

    // New see if a new user form was sent
    if(array_key_exists("new_user",$_POST)){
        if( array_key_exists("new_username",$_POST)&&
            array_key_exists("new_password",$_POST)&&
            array_key_exists("new_firstname",$_POST)&&
            array_key_exists("new_lastname",$_POST)&&
            array_key_exists("new_admin",$_POST)){

            $new_username = $_POST['new_username'];
            $new_password = password_hash($_POST['new_password'].'hashbrowns', PASSWORD_DEFAULT );
            $new_firstname = $_POST['new_firstname'];
            $new_lastname  = $_POST['new_lastname'];
            $new_admin = $_POST['new_admin'];

            $query = "SELECT * FROM user WHERE username ='". $new_username  ."'";
            $user_exists = $_SESSION['conn']->query($query);

            if($user_exists){
                $query ="
                    INSERT INTO user(username, password,firstname,lastname,created, lastlogin, isadmin) VALUES
                    ('$new_username', '$new_password', '$new_firstname', '$new_lastname',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, $new_admin)
                    ";
                $_SESSION['conn'] -> query($query);
            }

        }

    }

    // see if a user form was sent
    if(array_key_exists("edit_user", $_POST)){
        if($_POST["user_to_edit"] !== ""){
            // Check if the user exists
            $query = "SELECT * FROM user WHERE username= '". $_POST["user_to_edit"] . "'";
            $result = $_SESSION['conn'] -> query($query);
            if($result->fetch_row()){
                if($_POST["edit_password"] !== ""){
                    $column = password_hash($_POST["edit_password"] .'hashbrowns', PASSWORD_DEFAULT );
                    $user = $_POST['user_to_edit'];
                    $query = "UPDATE user SET password='$column' WHERE username='$user' ";
                    $_SESSION['conn']->query($query);
                }
                if($_POST["edit_firstname"] !== ""){
                    $column = $_POST["edit_firstname"];
                    $user = $_POST['user_to_edit'];
                    $query = "UPDATE user SET firstname='$column' WHERE username='$user' ";
                    $_SESSION['conn']->query($query);
                }
                if($_POST["edit_lastname"] !== ""){
                    $column = $_POST["edit_lastname"];
                    $user = $_POST['user_to_edit'];
                    $query = "UPDATE user SET lastname='$column' WHERE username='$user' ";
                    $_SESSION['conn']->query($query);
                }
                if($_POST["edit_admin"] !== ""){
                    $column = $_POST["edit_admin"];
                    $user = $_POST['user_to_edit'];
                    $query = "UPDATE user SET isadmin=$column WHERE username='$user' ";
                    $_SESSION['conn']->query($query);
                }
            }else{
                echo "User does not exist"; // TODO: delete
            }
        }else{
            echo"Did not put a value in user";
        }
    }


    if (!($_SESSION['is_signed_in'] && $_SESSION['is_admin'])){
        echo '<h1>You must be an admin to acces this page</h1>';
    }else{

        echo "<h1>Make new user</h1>";
        echo <<< _END
       <form method="POST" action="admin.php">
         Username: <input type="text" name="new_username">
         <br>
         Password: <input type="text" name="new_password"/> 
         <br>
         Firstname: <input type="text" name="new_firstname">
         <br>
         Lastname: <input type="text" name="new_lastname">
         <br>
         Admin (1 or 0): <input type="text" name="new_admin">
         <br>
         <input type="submit" value="make" name="new_user"/>
         
       </form>
       _END;

        echo "<h1>Edit a current user</h1>";
        echo <<< _END
        <form method="POST" action="admin.php">
        User to be changed: <input type="text" name="user_to_edit">
        <br>
        Password: <input type="text" name="edit_password">
        <br>
        Firstname: <input type="text" name="edit_firstname">
        <br>
        Lastname: <input type="text" name="edit_lastname">
        <br>
        Admin (1 or 0): <input type=text" name="edit_admin">
        <br/>
        <input type="submit" value="edit" name="edit_user">
        </form>
                 
        _END;
        show_users();
    }
    show_button();


?>