<?php
include_once("dbcon.php"); 
include("session.php");

if (isset($_POST['SignInUser'])) {

    $username = strip_tags($_POST['uname']);
    $username = trim($username);
    $username = htmlspecialchars($username);
    $username = stripslashes($username);

    $pwd = strip_tags($_POST['pwd']);
    $pwd = trim($pwd);
    $pwd = htmlspecialchars($pwd);
    $pwd = stripslashes($pwd);

    $sql = "SELECT * FROM users WHERE username = :username and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('username' => $username, 'password' => $pwd));

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($res[0]['userID'])) {
        $_SESSION['uname'] = $username;
        $_SESSION['userID'] = $res[0]['userID'];
        header("location: loggedIn.php");
    }
    else {
       echo "fel användarnamn eller lösenord<br><br>";
    }
    //header("location: loggedIn.php");
    /* log in */
}

if (isset($_POST['CreateUser'])) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('username' => $_POST['runame']));
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (isset($res[0]['userID'])) {
        echo "Användarnamnet finns redan";
    }
    else {
        
        $uname = strip_tags($_POST['runame']);
        $uname = trim($uname);
        $uname = htmlspecialchars($uname);
        $uname = stripslashes($uname);

        $pwd = strip_tags($_POST['rpwd']);
        $pwd = trim($pwd);
        $pwd = htmlspecialchars($pwd);
        $pwd = stripslashes($pwd);
        
        $email = strip_tags($_POST['remail']);
        $email = trim($email);
        $email = htmlspecialchars($email);
        $email = stripslashes($email);


        if (strlen($uname) < 15) {
            $sql = "INSERT INTO users(UserName, Password, Email) VALUES ('$uname', '$pwd', '$email')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array());
           
        }
        else {
            echo "användarnamn kan inte vara längre än 15 tecken!";
        }

    }
}

if (isset($_POST['SignIn'])) {
    Header("location: index.php");
}
if(isset($_POST['Register'])){
    header("location: registerUser.php");
}
?>