<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($koneksi, $sql);
$category = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $sql = "UPDATE categories SET name='$name' WHERE id=$id";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header("Location:categories.php?msg=Category updated successfully");
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
            <h1 class="text-center">Form Add Category</h1>

            <!-- Form Posts start-->
            <div class="w-50 mx-auto">
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo $category['name'] ?>">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="categories.php" class="btn btn-danger">Cancel</a>
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