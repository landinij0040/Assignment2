<?php

include_once 'data_base_connect.php';
include_once 'button.php';
// Add Sign out button if user is signed in
// can be accessed to all vistors
// User PHP sessions
// destroy session when use logs out


// Checking if $GLOBALS['is_signed_in']

exist_signed_in();

if($GLOBALS['is_signed_in']){
    header("Refresh:0; url=mainpage.php");
}else {


    echo <<< _END

       <h1>Sign In</h1>
       <form method="POST" action="mainpage.php">
         Username: <input type="text">
         <br>
          Password: <input type="text"/>
          
          <input type="submit" value="signin" name="sign_in"/>
          <input type="submit" value="sign_in_admin" name="sign_in_admin"/>
       </form>
                        <form method="POST" action="mainpage.php">
                            <input type="submit" value="Main"/>
                        </form>

_END;

}