<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up to our websitge</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <?php
    //ini_set('display_errors', 0);

    $email_incorrect = false;
    $password_incorrect = false;
    $password_incorrect_reason = "";
    $confirm_password_incorrect = false;
    $username_incorrect = false;
    $username_incorrect_reason = "";
    $email_is_used = false;
    $username_is_used = false;

    $servername = "localhost";
    $dbusername = "root";
    $userpassword = "";
    $dbname = "example_name";

    $connection = @mysqli_connect($servername, $dbusername, $userpassword, $dbname);

    if ($connection) {
        if (isset($_POST['subm_sign_up_form'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $username = $_POST['username'];

            if ($email != "" && $password != "" && $confirm_password != "" && $username != "" && strlen($password) >= 7 && strlen($password) <= 20 && strlen($username) >= 4 && strlen($username) <= 15) {
                
                $check_email = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
                $check_username = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
                if(mysqli_num_rows($check_email) == 0 && mysqli_num_rows($check_username) == 0) {
                    if ($confirm_password == $password) {
                        $save_data = "insert into users values(null, '$email', '$password', '$username')";
                        mysqli_query($connection, $save_data);
                    } else $confirm_password_incorrect = true;
                } else {
                    if(mysqli_num_rows($check_email) > 0) $email_is_used = true;
                    if(mysqli_num_rows($check_username) > 0) $username_is_used = true;
                }
            } else {
                if ($email == "") $email_incorrect = true;
                if ($password == "") {
                    $password_incorrect = true;
                    $password_incorrect_reason = "empty";
                } else if (strlen($password) < 7) {
                    $password_incorrect = true;
                    $password_incorrect_reason = "too_short";
                } else if (strlen($password) > 20) {
                    $password_incorrect = true;
                    $password_incorrect_reason = "too_long";
                }
                if ($username == "") {
                    $username_incorrect = true;
                    $username_incorrect_reason = "empty";
                } else if (strlen($username) < 4) {
                    $username_incorrect = true;
                    $username_incorrect_reason = "too_short";
                } else if (strlen($username) > 15) {
                    $username_incorrect = true;
                    $username_incorrect_reason = "too_long";
                }
                if ($confirm_password == "") $confirm_password_incorrect = true;
            }
        }
        mysqli_close($connection);
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
        <div id="sign_up_form">
            <p class="title">email <?php if ($email_incorrect == true) {
                                        echo "<span style='color: red;'> incorrect</span>";
                                    } 
                                    if ($email_is_used == true) {
                                        echo "<span style='color: red;'> email is already in use.</span>";
                                    } ?></p>
            <p class="underline"></p>
            <p><input type="email" name="email" placeholder="email..."></p>
            <p class="title">password <?php if ($password_incorrect == true) {
                                            if ($password_incorrect_reason == "empty") echo "<span style='color: red;'> incorrect - empty.</span>";
                                            else if ($password_incorrect_reason == "too_short") echo "<span style='color: red;'> incorrect - too short min 7 letters.</span>";
                                            else if ($password_incorrect_reason == "too_long") echo "<span style='color: red;'> incorrect - too long max 20 letters.</span>";
                                        } ?></p><p class="underline"></p>
            <p><input type="password" name="password" placeholder="password..."></p>
            <p class="title">confirm password <?php if ($confirm_password_incorrect == true) {
                                                    echo "<span style='color: red;'> incorrect</span>";
                                                } ?></p>
            <p class="underline"></p>
            <p><input type="password" name="confirm_password" placeholder="confirm password..."></p>
            <p class="title">username <?php if ($username_incorrect == true) {
                                            if ($username_incorrect_reason == "empty") echo "<span style='color: red;'> incorrect - empty.</span>";
                                            else if ($username_incorrect_reason == "too_short") echo "<span style='color: red;'> incorrect - too short min 4 letters.</span>";
                                            else if ($username_incorrect_reason == "too_long") echo "<span style='color: red;'> incorrect - too long max 15 letters.</span>";
                                        }
                                        if ($username_is_used == true) {
                                            echo "<span style='color: red;'> username is already in use.</span>";
                                        } ?></p>
            <p class="underline"></p>
            <p><input type="text" name="username" placeholder="username..."></p>
            <p><input type="submit" name="subm_sign_up_form"></p>
        </div>
    </form>
    <div id="footer">made by kubixqaz the god of programming</div>
</body>
</html>