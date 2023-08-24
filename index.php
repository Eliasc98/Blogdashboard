<?php include 'inc/header.php' ?>
<?php

//CREATE QUERY
$queryPost = 'SELECT * from posts order by date DESC';

//GET RESULT
$resultPost = mysqli_query($conn, $queryPost);

//FETCH DATA
$posts = mysqli_fetch_all($resultPost, MYSQLI_ASSOC);
// var_dump($posts);

//FREE RESULTS

// mysqli_free_result($resultPost);

// //CLOSE CONNECTION
// mysqli_close($conn);

?>


<div class="container">


    <h1>Posts</h1>
    <?php if (empty($posts)) : ?>
        <div class="text-align-center"><i>No Posts Here.</i></div>
    <?php endif; ?>

    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Weblog
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Blog</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($posts as $post) : ?>
                    <tr>

                        <td scope="row"><?php echo $post['id']; ?></td>
                        <td>
                            <?php echo $post['name']; ?>
                        </td>
                        <td><?php echo $post['email']; ?></td>
                        <td>

                            <?php echo $post['body']; ?>

                        </td>
                        <td><?php echo $post['date']; ?></td>

                        <td><a class="btn btn-default link-secondary" href="post.php?id=<?php echo $post['id']; ?>">View</a></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">




    <?php include 'inc/footer.php' ?>