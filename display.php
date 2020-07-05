<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Real time Object Detection using YOLO and p5.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js" type="text/javascript"></script>


</head>
<body>
<?php
    include('config.php');
    $id = $_GET['id'];
    $result =  mysqli_query($conn, "SELECT * FROM video WHERE id='$id'");
    if(isset($result)) {
    while ($data = mysqli_fetch_array($result)) {
        ?>
        <div class="row">
        <div class="col-md-8">
            <video width="720" height="576" controls>
                <source src="upload/<?php echo $data['path'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="col-md-3">
            <a  class="btn btn-success btn-fill pull-right" href="detectku.php?id=<?php echo $id; ?>">YUK MAIN !!!</a><br><br>
        </div>
        </div>
<?php
        }
    }

?>
</body>
</html>
