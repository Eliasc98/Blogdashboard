<?php

require('config/database.php');

if (isset($_POST['Delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $ins = "DELETE FROM posts WHERE id ={$delete_id}";
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
    <a href="/portfolio/Blog crud/index.php" class="btn btn-default">Back</a>

    <h1><?php echo $post['name']; ?></h1>



    <small>Created at <?php echo $post['date']; ?> with the email: <?php echo $post['email']; ?></small>
    <p>
        <?php echo $post['body']; ?>
    </p>

    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="pull-right" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
        <input type="submit" value="Delete" name="Delete" class="btn btn-danger">

    </form>
    <a class="btn btn-default" href="/portfolio/Blog crud/editpost.php?id=<?php echo $post['id']; ?>">Edit</a>



</div>
<?php include 'inc/footer.php' ?>