<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in to our website</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <?php
    ini_set('display_errors', 0);

    $empty_email_input = false;
    $empty_password_input = false;
    $database_answer = "";
    $sign_in_answer = "";

    $servername = "localhost";
    $dbusername = "root";
    $userpassword = "";
    $dbname = "example_name";

    $connection = @mysqli_connect($servername, $dbusername, $userpassword, $dbname);


    if($connection) {
        if(isset($_POST['subm_sign_in_form'])) {
            @$email = $_POST['email'];
            @$password = $_POST['password'];
            if($email != "" && $password != "") {
                $check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                if($check) {
                    if(mysqli_num_rows($check) == 1) {
                        //sign in
                        $sign_in_answer = "true";
                    } else $sign_in_answer = "false";
                } else $database_answer = "false";
            } else {
                if($email == "") $empty_email_input = true;
                if ($password == "") $empty_password_input = true;
            }
        }
    } else {
        error_log("no connection");
        header('Location: no-connection.html');
        die();
    }

    ?>
    <div id="bar">
        <input type="button" id="sign_in" onclick="signin_window()" value="sign in">
        <input type="button" id="sign_up" onclick="signup_window()" value="sign up">
    </div>
    <form method="post">
        <div id="sign_in_form">
            </p>
            <p class="title">email <?php if($empty_email_input == true) echo "<span style='color: red;'> incorrect - empty.</span>"; ?></p>
            <p class="underline"></p>
            <p><input type="email" name="email" placeholder="email..."></p>
            <p class="title">password <?php if($empty_password_input == true) echo "<span style='color: red;'> incorrect - empty.</span>"; ?></p>
            <p class="underline"></p>
            <p><input type="password" name="password" placeholder="password..."></p>
            <p><input type="submit" name="subm_sign_in_form"></p>
            <p><?php if ($database_answer == "false") echo "<span style='color: red;'> something went wrong please try later.</span>"; if($sign_in_answer == "false") echo "<span style='color: red;'> you typed in wrong emial or password.</span>"; if ($sign_in_answer == "true") echo "<span style='color: green;'> you have beed successfully signed in.</span>"; ?></p>
        </div>
    </form>
    <div id="footer">made by kubixqaz the god of programming</div>
</body>
</html>