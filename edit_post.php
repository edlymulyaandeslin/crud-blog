<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($koneksi, $sql);
$post = mysqli_fetch_assoc($result);


$sqlCateories = "SELECT * FROM categories";

$categories = mysqli_query($koneksi, $sqlCateories);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['kategori'];

    $sql = "UPDATE posts SET title='$title', description='$description', kategori='$category' WHERE id=$id";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header("Location:posts.php?msg=Post updated successfully");
    } else {
        echo "Failed: " . mysqli_error($koneksi);
    }
}

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

    <title>Add Blog Post</title>
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
            <h1 class="text-center">Form Edit Post</h1>

            <!-- Form Posts start-->
            <div class="w-50 mx-auto">
                <form method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?php echo $post['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control"
                            rows="6"><?php echo $post['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option selected>Pilih Kategori</option>
                            <?php
                            foreach ($categories as $category) {
                                if ($category['name'] == $post['kategori']) {
                                    echo '<option value="' . $category['name'] . '" selected>' . $category['name'] . '</option>';
                                } else {
                                    echo '<option value="' . $category['name'] . '">' . $category['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        <a href="posts.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>

            <!-- Form Posts end -->

        </div>



    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>