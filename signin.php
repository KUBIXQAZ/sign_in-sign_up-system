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
    <div id="bar">
        <input type="button" id="sign_in" onclick="signin_window()" value="sign in">
        <input type="button" id="sign_up" onclick="signup_window()" value="sign up">
    </div>
    <form method="post">
        <div id="sign_in_form">
            </p>
            <p class="underline">email</p>
            <p><input type="email" name="email" placeholder="email..."></p>
            <p class="underline">password</p>
            <p><input type="password" name="password" placeholder="password..."></p>
            <p><input type="submit" name="subm_sign_in_form"></p>
        </div>
    </form>
    <div id="footer">made by kubixqaz the god of programming</div>
    <?php
    //ini_set('display_errors', 0);
    ?>
</body>
</html>