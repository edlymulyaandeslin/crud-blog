<?php
include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location:posts.php?msg=Post deleted successfully");
} else {
    echo "Failed: " . mysqli_error($koneksi);
}