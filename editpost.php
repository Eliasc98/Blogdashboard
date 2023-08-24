<?php

require('config/database.php');

if (isset($_POST['submit'])) {
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $message = '';

    $ins = "UPDATE posts SET name= '$name', email = '$email', body='$body' WHERE id={$update_id}";
    $result = $conn->query($ins);

    if ($result) {
        header('Location: /portfolio/Blog crud/index.php');
    } else {
        die("error" . $conn->error);
    }
}

//GET ID

$id = mysqli_real_escape_string($conn, $_GET['id']);

//CREATE QUERY
$query = 'SELECT * FROM posts WHERE id=' . $id;

//GET RESULT
$result = mysqli_query($conn, $query);

//FETCH DATA
$post = mysqli_fetch_assoc($result);
// var_dump($post);

//FREE RESULTS

mysqli_free_result($result);

//CLOSE CONNECTION
mysqli_close($conn);

?>

<?php include 'inc/header.php' ?>
<div class="container">


    <h1>EDIT Post</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $post['name']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $post['email']; ?>">
        </div>
        <div class="form-group">
            <label for="body">Blog</label>
            <textarea type="text" name="body" id="body" class="form-control"><?php echo $post['body']; ?></textarea>
        </div>

        <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php include 'inc/footer.php' ?>