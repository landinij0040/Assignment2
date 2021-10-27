<?php

include_once 'data_base_connect.php';

//session_start();
// Add Sign out button if user is signed in
// can be accessed to all vistors
// User PHP sessions
// destroy session when use logs out


// Checking if $GLOBALS['is_signed_in']

exist_signed_in();
exist_admin();
if($_SESSION['is_signed_in']){
    header("Refresh:0; url=mainpage.php");
}else {
    echo <<< _END

       <h1>Sign In</h1>
       <form method="POST" action="mainpage.php">
         Username: <input type="text" name="username">
         <br>
         Password: <input type="text" name="password"/>
          
          <input type="submit" value="signin" name="sign_in"/>
       </form>
       <form method="POST" action="mainpage.php">
          <input type="submit" value="Main"/>
       </form>

_END;

}