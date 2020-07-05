<?php
session_start();
include("config.php");
if($conn) {
    //Query Insert Data
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat = $_POST['repeat'];
        $checker = $conn->query("SELECT * FROM signup where Email='".$email."'");

        $num_rows = mysqli_num_rows($checker);

        if($num_rows >= 1){
            $_SESSION['flash'] = "Email sudah ada";
        }else{
            if($password === $repeat){
                $result = $conn->query("INSERT INTO `signup` 
                (`id`, `Username`, `Email`, `Password`, `Repeat Password`) VALUES (NULL, '$username', '$email', '$password', '$repeat');");
            }else{
                echo "Password tidak sama kentod.";
            }
            $temp = mysqli_query($conn, "SELECT id FROM signup WHERE Email='".$email."'");
            $id = mysqli_fetch_array($temp);
            $_SESSION['id'] = $id[0];

            $_SESSION['username'] = $username;

            if($result==true){
                echo "Berhasil";
                header("location:dashboard.php");
            }else{
                echo "Tidak Berhasil";
            }
        }
    }
} else {
    echo "Not Connected";
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        * {box-sizing: border-box}
        body{
            background-image:url(landingpageawal-01.png);
            background-size:cover;
            background-attachment: fixed;
        }
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
            width:35%;
            border:1pt solid #ccc;
            border-radius:10px;
            margin:10px auto;
            font-family: arial;
            background-color:white;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<form action="daftar.php" method="POST">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="username"><b>Username</b></label>
        <input name="username" type="text" placeholder="Enter username"  required>

        <label for="email"><b>Email</b></label>
        <?php
        if(isset($_SESSION['flash'])){
            $err = $_SESSION['flash'];
            echo "<p class='alert' style='color: red;'>".$err."</p>";
            $_SESSION['flash'] = "";
        }
        ?>
        <input name="email" type="text" placeholder="Enter Email" required>

        <label for="password"><b>Password</b></label>
        <input name="password" type="password" placeholder="Enter Password" required>

        <label for="repeat"><b>Repeat Password</b></label>
        <input name="repeat" type="password" placeholder="Repeat Password" required>

        <div class="clearfix">
            <button type="button" class="cancelbtn" onclick="location.href='login.php'">Cancel</button>
            <button type="submit" class="signupbtn" name="submit" >Sign Up</button>
        </div>
    </div>
</form>
</body>
</html>