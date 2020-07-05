<?php
session_start();
include('config.php');

if(isset($_SESSION['id'])){
    $result =  mysqli_query($conn, "SELECT * FROM video WHERE user_id = '".$_SESSION['id']."' ORDER BY id DESC");
}else{
    $result =  mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC");
}
?>
<!doctype html>
<html lang="en">
<head>

    <title>Hello, world!</title>
    <style>
        .parent {
            display: flex;
        }

        .parent2 {
            display: flex;
            margin-top: 50px;
        }

        .left-bar {
            width: 20%;
            height: 1000px;
            background: lightblue;
        }

        .right-bar {
            width: 80%;
            height: 1000px;
            background: lightcoral;
        }

        .videoplace {
            width: 320px;
            height: 320px;
            background: #46de4b;
        }

        .discribe {
            width: 300px;
            height: 200px;
            background: beige;
        }
        body{
            background-image:url(bg2-01.png);
            background-size:cover;
            background-attachment: fixed;
        }
        .nav{
            margin-right:5%;
            margin-top:2%;
        }
    </style>
</head>
<body>




<div class="parent">
    <div class="left-bar">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <p> Hello, <?php echo $_SESSION['username'] ?> </p>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" href="awal.php">Play</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light " href="form.php">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="right-bar">
        <?php
        if(isset($result)) {
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="parent2">
                    <div class="videoplace">
                    <video width="320" height="240" controls>
                        <source src="upload/<?php echo $data['path'] ?>" type="video/mp4">
                    </video>
                        <button class="btn-primary"><a href="index.html">PLAY</a></button>
                    </div>
                    <div class="discribe">
                        <p><?php echo $data['judul'] ?></p>
                        <p><?php echo $data['deskripsi'] ?></p>
                    </div>
                </div>
                <p>==============================</p>
            <?php }
        }?>
    </div>

</div>

</body>
</html>