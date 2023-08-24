<?php

require('config/database.php');


//CREATE QUERY
$query = 'SELECT * from posts order by date DESC';

//GET RESULT
$result = mysqli_query($conn, $query);

//FETCH DATA
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($posts);

//FREE RESULTS

mysqli_free_result($result);

//CLOSE CONNECTION
mysqli_close($conn);

?>

<?php include 'inc/header.php' ?>
<div class="container">


    <h1>Posts</h1>
    <?php if (empty($posts)) : ?>
        <div class="text-align-center"><i>No Posts Here.</i></div>
    <?php endif; ?>

    <?php foreach ($posts as $post) : ?>

        <div class="card mb-4">
            <div class="well">
                <h3><?php echo $post['name']; ?></h3>
                <small>Created at <?php echo $post['date']; ?> with the email: <?php echo $post['email']; ?></small>
                <p>
                    <?php echo $post['body']; ?>
                </p>
                <a class="btn btn-default link-secondary" href="post.php?id=<?php echo $post['id']; ?>">...read more.</a>
            </div>
        </div>
    <?php endforeach; ?>


    <?php include 'inc/footer.php' ?>