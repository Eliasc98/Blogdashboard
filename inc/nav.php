<!-- <div class="container"> -->

<nav class="navbar  navbar-expand-lg bg-dark navbar-dark m-auto">
    <div class="container">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/portfolio/Blog crud/index.php" class=" navbar-brand">
                Welcome <?php echo $post['name']; ?>
            </a>
            <a href="/portfolio/Blog crud/index.php" class="text-secondary">
                <?php echo $_SESSION['email']; ?>
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/portfolio/Blog crud/index.php?id=<?php echo $post['id']; ?>" class="nav-link ">Read Blogs</a></li>
                <li class="nav-item"><a href="/portfolio/Blog crud/addpost.php?id=<?php echo $post['id']; ?>" class="nav-link  ">create Blogs</a></li>
                <li class="nav-item"><a href="/portfolio/Blog crud/blogpage.php?id=<?php echo $post['id']; ?>" class="nav-link  ">Blog page</a></li>
                <li class="nav-item ms-2"> <a href="/portfolio/Blog crud/auth/logout.php" class="btn btn-outline-danger">Logout</a></li>

            </ul>


        </div>
    </div>
</nav>
<!-- </div> -->