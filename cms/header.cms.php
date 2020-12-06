<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo E-Commerce</title>
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="../fontawesome-free-5.13.0-web/css/all.min.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['adminUid'])) {
        header("Location:../adminLogin.php");
        exit();
    }
    ?>

    <i id="prof-bars" class="fas fa-bars fa-2x"></i>
    <section id="side-nav">
        <div id="prof-cancel">X</div>
        <div id="admin-info">
                <div id="admin-name">Admin</div>
            </div>
        </div>
        <div id="nav-options">
            <!-- <a href="adminprofile.php">Profile</a> -->
            <a href="productall.cms.php">All Products</a>
            <a href="productadd.cms.php">Add Product</a>
        </div>
    </section>

    <div id="logout-button">
        <form action="">
            <button type="submit">Logout</button>
        </form>
    </div>
