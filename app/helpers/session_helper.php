<?php


    session_start();


    function isLoggedIn() {
        if (isset($_SESSION['user_id'])){
            return true;
        }else {
            return false;
        }
    }




    function setFlash( $message='')
    {
        $_SESSION['flash'] = $message;
    }

    function getFlash()
    {

        return $_SESSION['flash'] ?? false;
    }
    

    function destroyStatus(){
        unset($_SESSION['status']);
    }
// This function will handle both setting and getting flash messages.
function flash($name = '', $message = '', $class = 'alert alert-success') {
    // If a message is passed, set it in the session
    if (!empty($name)) {
        if (!empty($message)) {
            $_SESSION[$name] = ['message' => $message, 'class' => $class];
        }
    } 
    // If no message is passed, display the flash message and unset it from the session
    elseif (empty($message) && isset($_SESSION[$name])) {
        echo '<div class="' . $_SESSION[$name]['class'] . '" id="msg-flash">' . $_SESSION[$name]['message'] . '</div>';
        unset($_SESSION[$name]);
    }
}
