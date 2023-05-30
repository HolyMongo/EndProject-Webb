<?php
include_once("dbcon.php"); 
include("session.php");

unset($_SESSION['felMedelande']); //rensar felmedelande


if (isset($_POST['SignInUser'])) {
    //Gör variablerna "ofarliga" genom att rensa 
    $username = strip_tags($_POST['uname']);
    $username = trim($username);
    $username = htmlspecialchars($username);
    $username = stripslashes($username);
    
    $pwd = strip_tags($_POST['pwd']);
    $pwd = trim($pwd);
    $pwd = htmlspecialchars($pwd);
    $pwd = stripslashes($pwd);

    //Om något av variablerna är lika med "" allstå ingenting betyder det att användaren inta har skrivit in något och får då ett felmedelande och blir tillbakaskickad
    if ($username == "") {
        $_SESSION['felMedelande'] = "You have to enter a name";
        header("location: index.php");
        exit;
    }
    if ($pwd == "") {
        $_SESSION['felMedelande'] = "You have to enter a password";
        header("location: index.php");
        exit;
    }
    //annars hämtar vi data från databasen där användarnamn och lösen matchar det användaren skrev in
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('username' => $username));
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (password_verify($pwd, $res[0]['password'])) {
            $_SESSION['uname'] = $username;
            $_SESSION['userID'] = $res[0]['userID'];
            header("location: loggedIn.php");
            exit;
    }
    else {
       //annars ger vi ett felmedelande och skicakr tillbaka användaren
       $_SESSION['felMedelande'] = "fel användarnamn <br> eller lösenord";
       header("location: index.php");
       exit;
    }
    /*
    kanske byta ut kanske ha kvar. jag inte veta
    $sql = "SELECT * FROM users WHERE username = :username and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('username' => $username, 'password' => $hash));

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //om vi hittar något, det vill säga om det finns någon användare i databasen med båda de värdena så ger vi session variabler lite värden och sedan skickar användaren till LoggedIn.php
    if (isset($res[0]['userID'])) {
        $_SESSION['uname'] = $username;
        $_SESSION['userID'] = $res[0]['userID'];
        header("location: loggedIn.php");
        exit;
    }
    else { //annars ger vi ett felmedelande ocg skicakr tillbaka användaren
        $_SESSION['felMedelande'] = "fel användarnamn <br> eller lösenord";
        header("location: index.php");
        exit;
    }
    */
}
elseif (isset($_POST['CreateUser'])) {

    //Rensar variabler från falriga tecken och data
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

        //Kollar om något av värderna är "" eller ingenting och ger då ett felmedelande för respektive fel. Användaren blir senare tillbakaskickad
        if ($uname == "") {
            $_SESSION['felMedelande'] = "You have to enter a name";
            header("location: registerUser.php");
            exit;
        }
        if ($pwd == "") {
            $_SESSION['felMedelande'] = "You have to enter a password";
            header("location: registerUser.php");
            exit;
        }
        if ($email == "") {
            $_SESSION['felMedelande'] = "You have to enter an email";
            header("location: registerUser.php");
            exit;
        }

    
        //hämtar data från databasen där den har samma användarnamn som det namnet användaren försökte skicka in
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array('username' => $uname));
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (isset($res[0]['userID'])) {
        //Om den redan finns ändras felmedelandet och användaren skickas tillbaka
            $_SESSION['felMedelande'] = "Användarnamnet finns redan";
            header("location: registerUser.php");
            exit;
        }
        else {
            //Om det inte finns så läggs användaren in i databasen och skickas till index.php där hen kan logga in med sin nya användare
            $hash = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(UserName, Password, Email) VALUES ('$uname', '$hash', '$email')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array());
            header('location: index.php');
        }
}
elseif (isset($_POST['SignIn'])) {
    Header("location: index.php");
    exit;
}
elseif(isset($_POST['Register'])){
    header("location: registerUser.php");
    exit;
}
else{
    header("location: index.php");
    exit;
}

?>