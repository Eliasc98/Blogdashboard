<?php
session_start();
include '../config/database.php';

//CREATE QUERY
$query = 'SELECT * from `signup database`';

//GET RESULT
$result = mysqli_query($conn, $query);

//FETCH DATA
$post = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($post);

//FREE RESULTS

mysqli_free_result($result);



if (isset($_POST['submit'])) {


    $message = '';

    $sqlemail = sprintf('SELECT * FROM `signup database` WHERE email = "%s"', $conn->real_escape_string($_POST['email']));

    $result = $conn->query($sqlemail);

    $user = $result->fetch_assoc();

    if ($user) {
        if ($_POST['password'] == $user['password']) {
            $_SESSION['email'] = $user['email'];
            header("Location: /portfolio/Blog crud/index.php?id=" . $user['id']);
        } else {
            $message = "Invalid Login Details!";
        }
    } else {
        $message = "Invalid Login Details!";
    };
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Log In</title>
</head>

<body>
    <h1>Log In</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <?php if (!empty($message)) : ?>
            <div style="font-size: 12px; color: red;"><?php echo $message; ?></div>
        <?php endif; ?>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>



        <input type="submit" name="submit" value="Log in">
    </form>

    <p> Have no account? <a href="signup.php">Sign Up</a>
</body>

</html>