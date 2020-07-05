<?php
session_start();
$target_dir = "upload/";
if(isset($_FILES["file"]["name"])){
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//    var_dump($imageFileType);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = $_FILES["file"]["type"];
        var_dump($check);
        if($check == "video/mp4") {
            echo "File is an video - " . $check . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an video.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($check != "video/mp4" ) {
        echo "Sorry, only mp4 are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            $connection = mysqli_connect("localhost","root","", "tugasakhir");
            if($connection) {
                //Query Insert Data
                if(isset($_POST['submit'])) {
                    $judul = $_POST['judul'];
                    $deskripsi = $_POST['deskripsi'];
                    $objek = $_POST['objek'];
                    $path = $_FILES['file']['name'];
                    $id = $_SESSION['id'];
                    $result = $connection->query("INSERT INTO `video` (`id`, `judul`, `deskripsi`, `objek`, `path`, `user_id`) VALUES (NULL, '$judul', '$deskripsi', '$objek', '$path', '$id');");

                    if($result==true){
                        echo "Berhasil";
                        header("location:dashboard.php");
                    }else{
                        echo "Tidak Berhasil";
                    }
                }
            } else {
                echo "Not Connected";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>
