<?php


    // Used to display buttons with correct coressponding pages
    function show_button(){
        $current_file_name = basename($_SERVER['PHP_SELF']);

        if(!$GLOBALS['is_signed_in']){
            echo <<< _END

                        <form method="POST" action="signin.php">
                            <input type="submit" value="Sign In"/>
                        </form>

                    _END;
        }
        if($GLOBALS['is_signed_in']){
            echo <<< _END

                        <form method="POST" action="mainpage.php">
                            <input type="submit" value="Sign Out" name="sign_out"/>
                        </form>

                    _END;
        }
        if($GLOBALS['is_signed_in'] && $current_file_name != 'mainpage.php'){
            echo <<< _END

                        <form method="POST" action="mainpage.php">
                            <input type="submit" value="Main"/>
                        </form>

                    _END;
        }
        if( $GLOBALS['is_signed_in'] && $current_file_name != 'user.php'){
            echo <<< _END

                        <form method="POST" action="user.php">
                            <input type="submit" value="User"/>
                        </form>

                    _END;
        }
        if($GLOBALS['is_signed_in'] && $current_file_name!= 'admin.php' && $GLOBALS['is_admin']){
            echo <<< _END

                        <form method="POST" action="admin.php">
                            <input type="submit" value="Admin"/>
                        </form>

                    _END;
        }
    }


    function button_on_click(){
        if(array_key_exists('sign_in', $_POST)){
            $GLOBALS['is_signed_in'] = True;
        }

        if(array_key_exists('sign_out', $_POST)){
            $GLOBALS['is_signed_in'] = False;
        }
    }

