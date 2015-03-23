<?php
    session_start();
    $CONN = mysqli_connect('localhost', 'root', '', 'ana_blog');

    $username = $_POST['user'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM user_info WHERE user='$username' AND password='$password'";

    $result = mysqli_query($CONN, $sql);
    
    if(mysqli_num_rows($result)>0) {
        $user_info = mysqli_fetch_assoc($result);
        $_SESSION['user_info'] = $user_info;
            echo "You are now logged in!";
        //if user/pass is validated, needs to go back to the index.php
        header('location:../navigation/post_form.php');
    } else {
        echo "Your user/password is incorrect";
    }

?>