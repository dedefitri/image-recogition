<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:dashboard2.php");
}
include "config.php";
if (isset($_POST['submit'])) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $connection = mysqli_query($conn," SELECT * FROM signup WHERE Username='$Username' OR Email='$Username'");

    $data = mysqli_fetch_array($connection);
    if (mysqli_num_rows($connection) >=1 && $data['Password'] == $Password) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['Username'];
        header("location:dashboard2.php");
    }else{
        $_SESSION['flash'] = "Username atau Password salah";
    }

}
?>
<html>
<head>
    <title>Membuat Desain Form Login Dengan CSS - www.malasngoding.com</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<style>
    body{
        background-image:url(background.png);
        background-size:cover;
        background-attachment: fixed;
        font-family: Arial;
    }

    h1{
        text-align: center;
        /*ketebalan font*/
        font-weight: 300;
    }

    .tulisan_login{
        text-align: center;
        /*membuat semua huruf menjadi kapital*/
        text-transform: uppercase;
    }

    .kotak_login{
        width: 350px;
        background: cream;
        /*meletakkan form ke tengah*/
        margin: 110px auto;
        padding: 30px 20px;
        border-radius: 30px;
    }

    label{
        font-size: 11pt;
    }

    .form_login{
        /*membuat lebar form penuh*/
        box-sizing : border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }

    .tombol_login{
        background: #46de4b;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }

    .link{
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }

</style>


<div class="kotak_login">
    <p class="tulisan_login">Silahkan login</p>

    <form action="login.php" method="POST">
        <label>Username</label>
        <input type="text" name="username" class="form_login" placeholder="Username atau email ..">

        <label>Password</label>
        <input type="password" name="password" class="form_login" placeholder="Password ..">

        <?php
            if(isset($_SESSION['flash'])) {

                ?>
                <p class="alert-danger">Username Atau Password Salah</p>
                <?php
            }
        ?>
        <input type="submit" name ="submit" class="tombol_login" value="LOGIN">

        <br/>
        <br/>

        <br/>
        <br/>
        <center>
            <p>
                dont have account?
            </p>
            <a class="link" href="daftar.php">Sign Up</a>
        </center>
    </form>

</div>


</body>
</html>
