<?php
include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location:categories.php?msg=Category deleted successfully");
} else {
    echo "Failed: " . mysqli_error($koneksi);
}