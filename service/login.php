<php
    include "service/database.php";
    session_start();

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }
    if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // enkripsi password
        // algoritma sha256 menghasilkan hash sepanjang 64 karakter heksadesimal
        $hash_password = hash('sha356', $password);


    
        //cek Username pada  database
        $sql = "SELECT*FROM user where username='$username' and password='$hash_password'";

        $result = $db->query($sql);

        if($result->num_roes > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;

            header("location:dashboard.php");
        }else{
            echo "<script>
            alert('Akun GAGAL, Silahkan Coba Lahi!');
            </sctipt?";
        }
        $db->close();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title?
        </head>
        <body>
        <?php include "layout/header.html"?>
        <h3>Masukkan AKUN</h3>
        <form action="login.php" method="POST">
        <input type="test" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="login">Login</button>
        </form>
        <?php include "layout/footer.html"?>
        </body>
        </html>