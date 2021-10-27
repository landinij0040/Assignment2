<?php

//    session_start();

    // Used to display buttons with correct coresponding pages
    function show_button(){
        $current_file_name = basename($_SERVER['PHP_SELF']);

        if(!$_SESSION['is_signed_in']){
            echo <<< _END

                        <form method="POST" action="signin.php">
                            <input type="submit" value="Sign In"/>
                        </form>

                    _END;
        }
        if($_SESSION['is_signed_in']){
            echo <<< _END

                        <form method="POST" action="mainpage.php">
                            <input type="submit" value="Sign Out" name="sign_out"/>
                        </form>

                    _END;
        }
        if($_SESSION['is_signed_in'] && $current_file_name != 'mainpage.php'){
            echo <<< _END

                        <a href="mainpage.php">Main</a>

                    _END;
        }
        if( $_SESSION['is_signed_in'] && $current_file_name != 'user.php'){
            echo <<< _END

                            <!--<form method="POST" action="user.php">-->
                            <a href="user.php">User</a>
                            <!--</form>-->

                    _END;
        }

        if($_SESSION['is_signed_in'] && $current_file_name!= 'admin.php' && $_SESSION['is_admin']){
            echo <<< _END

                        <a href="admin.php">Admin</a>

                    _END;
        }
    }


    function button_on_click(){
        if(array_key_exists('sign_in', $_POST)){
            if(array_key_exists('username',$_POST) && array_key_exists('password', $_POST)){
                user_exists($_POST['username'],$_POST['password'] );
            }else{
                echo "Didn't put either username or password";
            }
        }

        if(array_key_exists('sign_out', $_POST)){
            $_SESSION['is_signed_in'] = False;
            $_SESSION['is_admin'] = False;
        }
        
    }

