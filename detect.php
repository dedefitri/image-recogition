<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Real time Object Detection using YOLO and p5.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@0.1.1/dist/ml5.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
<h1></h1>
    <p id="status">Loading Model...</p>


    Temukan objek berikut :<b><label id="quiz">
    <?php
    include('config.php');
    $id = $_GET['id'];
    $result =  mysqli_query($conn, "SELECT * FROM video WHERE id='$id'");
    if(isset($result)) {
        while ($data = mysqli_fetch_array($result)) {
            echo $data['objek'];
            $categories = $data['objek'];
        }
    }

    ?></label></b><br>

    <?php
    $cats = explode(",", $categories );
    foreach($cats as $cat) {
        $cat = trim($cat);
        echo "<label id=\"" . $cat . "\">- Object yang dicari: ".$cat."</label><br>";
    }

    ?>

    <p><span id="resultDetection"></span></p>

<script src="sketch.js"></script>
</body>
</html>
