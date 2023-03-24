<?php
if(isset($_POST['Register'])){
    header("location: registerUser.php");
}
if (isset($_POST['SignInUser'])) {
    header("location: inloggad.php");
    /* log in */
}
if (isset($_POST['SignIn'])) {
    Header("location: index.php");
}
if (isset($_POST['CreateUser'])) {
    echo "User Created!";
}

?>