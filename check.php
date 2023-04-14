<?php
include_once("dbcon.php"); 

if (isset($_POST['SignInUser'])) {
    $sql = "SELECT * FROM users WHERE username = :username and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('username' => $_POST['uname'], 'password' => $_POST['pwd']));

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($res[0]['userID'])) {
        $_SESSION['uname'] = $_POST['uname'];
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
        
        $uname = $_POST['runame'];
        $pwd = $_POST['rpwd'];
        $email = $_POST['remail'];

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