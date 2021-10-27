

<?php
    include_once 'data_base_connect.php';
    include_once 'button.php';

    // New see if a new form was sent
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
            $query ="
                    INSERT INTO user(username, password,firstname,lastname,created, lastlogin, isadmin) VALUES 
                    ('$new_username', '$new_password', '$new_firstname', '$new_lastname',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, $new_admin)
                    ";
//            $_SESSION['conn'] -> query(" INSERT INTO user(username, password,firstname,lastname,created, lastlogin, isadmin) VALUES
//            ('user1', 'user2', 'fname', 'lname',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0)
//                    ");
            $_SESSION['conn'] -> query($query);


            echo"<script>console.log(\"" . $query  . "\")</script>";

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
        show_users();
    }
    show_button();


?>