<?php

require('config/database.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['body'];
    $message = '';

    $ins = "INSERT into posts (name, email, body) values ('$name', '$email', '$body')";
    $result = $conn->query($ins);

    if ($result) {
        header('Location: /portfolio/Blog crud/blogpage.php');
    } else {
        die("error" . $conn->error);
    }
}

?>

<?php include 'inc/header.php' ?>
<div class="container">


    <h1>Create Blog</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Author mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Blog</label>
            <textarea type="text" name="body" id="body" class="form-control"></textarea>
        </div>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php include 'inc/footer.php' ?>