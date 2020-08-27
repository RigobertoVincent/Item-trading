<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyl.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>

<?php
//    include '../base.php';
        if (isset($_POST["username"]) && isset($_POST["password"]) ) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $servername = "localhost";
            $user = "root";
            $pass = "root";
            $database = "offerCreator";
            $dbport = 3306;
            $db = new mysqli($servername, $user, $pass, $database, $dbport);
            $query = "SELECT * FROM User WHERE username = '" . $username . "'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);


            if (password_verify($password,$row["password"])){
                header('Location: Home.html');
            } else{
                echo "user not found";
            }
        }
        ?>

<div id="container-login">
    <div id="title">
        <i class="material-icons lock">lock</i> Login
    </div>

    <form method="post">
        <div class="input">
            <div class="input-addon">
                <i class="material-icons">face</i>
            </div>
            <input id="username" placeholder="Username" type="text"  name = "username"  autocomplete="off">
        </div>


        <div class="clearfix"></div>


        <div class="input">
            <div class="input-addon">
                <i class="material-icons">vpn_key</i>
            </div>
            <input id="password" placeholder="Password" type="password" name = "password"  autocomplete="off">
        </div>
<!--        <div class="remember-me">-->
<!--            <input type="checkbox">-->
<!--            <span style="color: #DDD">Remember Me</span>-->
<!--        </div>-->
        <input type="submit" value="Log In" />
    </form>


    <div class="register">
        Don't have an account yet?
        <a href="Registration.php"><button id="register-link">Register here</button></a>
    </div>

</div>
</body>

</html>

