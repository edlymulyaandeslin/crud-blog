<?php
include "koneksi.php";

$sql = "SELECT * FROM posts";
$posts = mysqli_query($koneksi, $sql);
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
            <div class="d-flex justify-content-between my-2">
                <h4>List Posts</h4>
                <a href="add_post.php" class="btn btn-primary">Add New Post</a>
            </div>

            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            ?>

            <!-- Posts list -->
            <table class="table table-hove">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($posts as $key => $value) {
                    ?>

                    <tr>
                        <th scope="row"><?php echo $key + 1 ?></th>
                        <td><?php echo $value['title'] ?></td>
                        <td class="text-truncate" style="max-width: 50px;"><?php echo $value['description'] ?></td>
                        <td><?php echo $value['kategori'] ?></td>
                        <td>
                            <a href="edit_post.php?id=<?php echo $value['id']; ?>"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete_post.php?id=<?php echo $value['id']; ?>"
                                class="btn btn-outline-danger btn-sm"
                                onClick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <!-- Posts end -->

        </div>



    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>