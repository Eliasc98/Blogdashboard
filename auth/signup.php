<?php include 'extras/database.php' ?>
<?php
$name = $email = $password = $confirm_password = '';
$err_name = $err_email = $err_password = $err_confirm_password = $err_pass = '';

if (isset($_POST['submit'])) {
    //name 

    if (empty($_POST['name'])) {
        $err_name = "Please Put in your name";
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    // email

    if (empty($_POST['email'])) {
        $err_email = "Please put in your email";
    } elseif ($con->errno === 1062) {
        $err_email = "Email already taken";
    } else {
        $email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    //password
    if (empty($_POST['password'])) {
        $err_password = "Please put in your password";
    } else {
        if (strlen($_POST['password']) < 8) {
            $err_password = "* Password must be at least 8 characters";
        } else {
            $password = htmlspecialchars($_POST['password']);
        }
    }

    //confirm password

    if (empty($_POST['password_confirmation'])) {
        $err_confirm_password = "Please put in confirm password";
    } else {
        $confirm_password =  htmlspecialchars($_POST['password']);
    }

    //two password verification

    if ($password != $confirm_password) {
        $err_pass = "Passwords does not match!";
    }

    if (empty($err_name) && empty($err_email) && empty($err_pass) && empty($err_confirm_password)  && empty($err_password)) {
        $ins = "insert into `signup database` (name, email, password) values ('$name', '$email', '$password')";
        $result = $con->query($ins);
        if ($result) {
            $message = "Congratulations, You've Signed Up Successfully!";
            // header('Location: signup.php');
        } else {
            $message = 'Error: ' . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Sign Up</title>
</head>

<body>
    <h1>Sign Up</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <?php if (!empty($message)) : ?>
            <div class="bg-success text-center text-white" style="background-color: green; color: white; text-align: center; width: 100%;"><?php echo $message; ?></div>
        <?php endif; ?>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
            <div style="color: red; font-size: 10px;"><?php echo $err_name; ?></div>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $email ?>">
            <div style="color: red; font-size: 10px;"><?php echo $err_email; ?></div>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <div style="color: red; font-size: 10px;"><?php echo $err_password; ?></div>
        </div>

        <div>
            <label for="password_confirmation">Re-enter Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            <div style="color: red;  font-size: 10px;"><?php echo $err_confirm_password; ?></div>

            <?php if ($password != $confirm_password) : ?>
                <div style="color: red;  font-size: 10px;"><?php echo $err_pass; ?></div>
            <?php endif; ?>
        </div>

        <input type="submit" name="submit" value="Sign Up">
    </form>

    <p> Are you an existing user? <a href="login.php">Login</a>

        <script>
            let bgSuccess = document.querySelector('.bg-success');

            setTimeout(() => {
                bgSuccess.remove();
            }, 5000);
        </script>
</body>

</html>