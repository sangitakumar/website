<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, Admin!</h1>
            <a href="logout.php">Logout</a>
        </header>

        <section class="upload-section">
            <h2>Upload an Image</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <button type="submit" name="submit">Upload Image</button>
            </form>
        </section>

        <section class="image-display">
            <h2>Uploaded Images</h2>
            <div class="gallery">
                <?php
                // Fetch and display uploaded images
                $images = glob("uploads/*.{jpg,png,jpeg,gif}", GLOB_BRACE);
                foreach ($images as $image) {
                    echo "<div class='image'><img src='$image' alt='Uploaded Image'></div>";
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
