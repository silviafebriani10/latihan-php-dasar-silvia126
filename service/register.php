<?php
    include "service/database.php";

    session_start();

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    //$register_message = "";

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        //enkripsi password
        //algoritma sha356 menghasilkan hash sepanjang 64 karakter heksadesimal
        $hash_password = hash('sha256', $password);

        try {

            //Tambahkan user baru ke database
            $sql = "INSERT INTO user (username, password) VALUES 
            ('$username','$hash_password')";

            //Cek konfirmasi Password
            if($db->query($sql)){
                echo "<script>
                    alert('User Baru berhasil ditambahkan');
                </script>";
                //$register_message="User Baru Berhasil ditambahkan";
            }else{
                echo "<script>
                    alert('User Baru GAGAL, Silahkan Coba Lagi!');
                </script>";
                //$register_message="User Baru GAGAL Silahkan Coba Lagi!');
            }
        }catch (mysql_sql_exception) {
            echo "<script>
            alert('User Sudah Ada, Silahkan Ganti yang lain');
            </script>";
        }
        $db->close();
    }
    ?>


<!DOCTYPE html>
<html lang="en">
    <hrad>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </hrad>
<body>
    <?php include "layout/header.html" ?>
    <h3>DAFTAR AKUN</h3>
    <i><?$register_message ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">Register</button>
</form>
<?php include "layout/footer.html"?>
</body>
    </html>
    