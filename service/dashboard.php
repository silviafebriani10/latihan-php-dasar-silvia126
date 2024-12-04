<?php
    sessiom_start();
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UFA-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
    <?php include "layout/header.html" ?>

    <h1>SELAMAT DATANG <?= $_SESSION["username"]?> </h1>
    <form action="dashboard.php" method="POST">
        <button type="submit" name="lagout">Logout</button>
</form>
<?php include "layout/footer.html"?>
</body>
</html?