<?php session_start() ?>
<?php include 'config/database.php' ?>
<?php

//GET ID

$id = mysqli_real_escape_string($conn, $_GET['id']);

//CREATE QUERY
$query = 'SELECT * FROM `signup database` WHERE id=' . $id;

//GET RESULT
$results = mysqli_query($conn, $query);

//FETCH DATA
$post = mysqli_fetch_assoc($results);
// var_dump($post);

//FREE RESULTS

// mysqli_free_result($results);

// //CLOSE CONNECTION
// mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/portfolio/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Dashboard | <?php echo $post['name']; ?></title>
</head>

<body>
    <?php include "nav.php"; ?>