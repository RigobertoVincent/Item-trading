<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        body {
            background-color: #303641;
        }
    </style>


</head>

<body>


<div id="container-register">
    <div id="title">
        <i class="material-icons lock">lock</i> Register
    </div>

    <form method="post">
        <?php
        if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) ) {
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
            $servername = "localhost";
            $user = "root";
            $pass = "root";
            $database = "offerCreator";
            $dbport = 3306;
            $db = new mysqli($servername, $user, $pass, $database, $dbport);
            $query = "INSERT INTO User VALUES (null,'" . $username . "', '" . $password . "', '" . $email . "')";
            $result = mysqli_query($db, $query);
            if($result) { header('Location: Home.html'); } else { echo "error"; }
        }
        ?>


        <div class="input">
            <div class="input-addon">
                <i class="material-icons">email</i>
            </div>
            <input id="email" placeholder="Email" type="email" name = "email"  autocomplete="off">
        </div>


        <div class="clearfix"></div>


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
            <input id="password" placeholder="Password" type="password"  name = "password"   autocomplete="off">
        </div>


        <input type="submit" value="Register" />
    </form>



    <div class="register">
        Do you already have an account?
        <a href="Login.php"><button id="register-link">Log In here</button></a>
    </div>



</div>

</body>

</html>
