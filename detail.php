<?php
include "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=$id";

$result = mysqli_query($koneksi, $sql);

$post = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Blog Post</title>
</head>

<body>
    <div class="container">
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="index.php">Blogger</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="posts.php">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <div class="mt-4">
            <h1 class="text-center">Detail Post</h1>

            <!-- Detail Posts -->
            <div class="border rounded my-2 p-4" style="min-height: 200px;">
                <h1 class="mb-3"><?php echo $post['title']; ?></h1>
                <h6 class="mb-4">Category : <?php echo $post['kategori']; ?></h6>
                <p><?php echo $post['description']; ?></p>
                <div>
                    <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>

            </div>
            <!-- Detail Posts end-->

        </div>



    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>