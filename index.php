<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"> 
    <script>
        function change_from(menu) {
    if(menu == 0) {
        var sign_in_from = document.getElementById("sign_in_form");
        var sign_up_form = document.getElementById("sign_up_form");

        sign_in_from.style.visibility = "visible";
        sign_up_form.style.visibility = "hidden";
    }
    if (menu == 1) {
        var sign_in_from = document.getElementById("sign_in_form");
        var sign_up_form = document.getElementById("sign_up_form");

        sign_in_from.style.visibility = "hidden";
        sign_up_form.style.visibility = "visible";
    }
}
    </script>
</head>
<body>
    <div id="bar">
        <input type="button" id="sign_in" onclick="change_from(0)" value="sign in">
        <input type="button" id="sign_up" onclick="change_from(1)" value="sign up">
    </div>
    <br>
    <form method="post">
        <div id="sign_in_form"></p>
            <p class="title">email</p>
            <p><input type="email" name="email" placeholder="email..."></p>
            <p class="title">password</p>
            <p><input type="password" name="password" placeholder="password..."></p>
            <p><input type="submit" name="subm_sign_in_form"></p>
        </div>
        <div id="sign_up_form" style="visibility: hidden;">
        <p class="title">email</p>
            <p><input type="email" name="email" placeholder="email..."></p>
            <p class="title">password</p>
            <p><input type="password" name="password" min="5" max="30" placeholder="password..."></p>
            <p class="title">confirm password</p>
            <p><input type="password" name="confirm_password" placeholder="confirm password..."></p>
            <p class="title">username</p>
            <p><input type="text" name="username" min="5" max="15" placeholder="username..."></p>
            <p><input type="submit" name="subm_sign_up_form"></p>
        </div>
    </form>
    <?php
        if(isset($_POST['subm_sign_up_form'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $username = $_POST['username'];

            if($email != "" && $password != "" && $confirm_password != "" && $username != "") {
                if($confirm_password == $password) {
                    $connection = mysqli_connect("localhost","root","","users_data");
                    if($connection == false) error_log("no connection");
                    $save_data = "insert into users values(null, '$email', '$password', '$username')";
                    mysqli_query($connection, $save_data);
                }
            }
        }
    ?>
</body>
</html>